@extends('layouts.app')

@section('title', $service->title . ' - Global Mental Healthcare Association')
@section('description', $service->description)

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('{{ $service->image ? asset('storage/' . $service->image) : 'https://images.unsplash.com/photo-1527689368864-3a821dbccc34?w=1920&q=80' }}'); min-height: 60vh;">
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-8">
                <span class="badge-custom mb-3 d-inline-block" style="background: rgba(255,255,255,0.2); color: white;">{{ ucfirst($service->category) }}</span>
                <h1 class="display-3 fw-semibold mb-4">{{ $service->title }}</h1>
                <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">{{ $service->description }}</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Service Details -->
<section class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card p-5" style="box-shadow: 0 2px 24px rgba(0,0,0,0.08);">
                <h2 class="h3 mb-4">About This Service</h2>
                <div style="line-height: 1.8; color: var(--text-dark);">
                    {!! nl2br(e($service->full_description)) !!}
                </div>

                <hr class="my-5">

                <h3 class="h4 mb-4">What to Expect</h3>
                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="card-icon-small flex-shrink-0">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div>
                                <h5 class="mb-2" style="font-size: 1rem;">Session Duration</h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">Typically 50-60 minutes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="card-icon-small flex-shrink-0">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div>
                                <h5 class="mb-2" style="font-size: 1rem;">Scheduling</h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">Flexible appointment times</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="card-icon-small flex-shrink-0">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <div>
                                <h5 class="mb-2" style="font-size: 1rem;">Format Options</h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">In-person or virtual sessions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3">
                            <div class="card-icon-small flex-shrink-0">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div>
                                <h5 class="mb-2" style="font-size: 1rem;">Privacy</h5>
                                <p class="text-muted mb-0" style="font-size: 0.9rem;">Completely confidential</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-lg px-5">Schedule This Service</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Related Services -->
@if($relatedServices->count() > 0)
<section class="container">
    <div class="row text-center mb-5">
        <div class="col">
            <h2 class="section-title" style="font-size: 2rem;">Related Services</h2>
        </div>
    </div>
    <div class="row g-4">
        @foreach($relatedServices as $related)
        <div class="col-md-4">
            <div class="card">
                @if($related->image)
                <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top aspect-4-3 img-cover" alt="{{ $related->title }}">
                @else
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&h=450&fit=crop&q=80" class="card-img-top aspect-4-3 img-cover" alt="{{ $related->title }}">
                @endif
                <div class="card-body p-4">
                    <h5 class="card-title mb-3">{{ $related->title }}</h5>
                    <p class="card-text text-muted mb-4" style="font-size: 0.95rem;">{{ $related->description }}</p>
                    <a href="{{ route('services.show', $related->slug) }}" class="btn btn-primary btn-sm">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<div class="spacer-lg"></div>
@endif
@endsection