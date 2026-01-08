@extends('layouts.app')

@section('title', 'Our Services - Global Mental Healthcare Association')
@section('description', 'Comprehensive mental health services including individual therapy, group counseling, family therapy, and crisis support.')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('https://images.unsplash.com/photo-1527689368864-3a821dbccc34?w=1920&q=80'); min-height: 50vh;">
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-semibold mb-4">Mental Health Services</h1>
                <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Personalized care designed to support your unique journey to wellness.</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Services Grid -->
<section class="container">
    @if($categories->count() > 0)
    <div class="row mb-5">
        <div class="col-12 text-center">
            <div class="d-inline-flex gap-2 flex-wrap justify-content-center">
                <button class="badge-custom" style="border: none; cursor: pointer;" data-filter="all">All Services</button>
                @foreach($categories as $category)
                <button class="badge-custom" style="border: none; cursor: pointer; background: var(--light-gray); color: var(--text-muted);" data-filter="{{ $category }}">{{ ucfirst($category) }}</button>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div class="row g-4">
        @forelse($services as $service)
        <div class="col-md-6 col-lg-4" data-category="{{ $service->category }}">
            <div class="card h-100">
                @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top aspect-4-3 img-cover" alt="{{ $service->title }}">
                @else
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&h=450&fit=crop&q=80" class="card-img-top aspect-4-3 img-cover" alt="{{ $service->title }}">
                @endif
                <div class="card-body p-4 d-flex flex-column">
                    <span class="badge-custom mb-3 align-self-start">{{ ucfirst($service->category) }}</span>
                    <h5 class="card-title mb-3">{{ $service->title }}</h5>
                    <p class="card-text text-muted mb-4 flex-grow-1" style="font-size: 0.95rem;">{{ $service->description }}</p>
                    <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary btn-sm">Learn More</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-heart-pulse" style="font-size: 4rem; color: var(--primary-blue); opacity: 0.3;"></i>
            <p class="text-muted mt-3">No services available at the moment.</p>
        </div>
        @endforelse
    </div>
</section>

<div class="spacer-lg"></div>

<!-- CTA Section -->
<section class="container">
    <div class="cta-overlay" style="background-image: url('https://images.unsplash.com/photo-1499209974431-9dddcece7f88?w=1920&q=80');">
        <div class="container cta-content text-center py-5">
            <h2 class="display-5 fw-semibold mb-4">Not Sure Where to Start?</h2>
            <p class="lead mb-5" style="max-width: 600px; margin: 0 auto; opacity: 0.95;">We're here to help you find the right care. Schedule a consultation to discuss your needs.</p>
            <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg px-5">Schedule Consultation</a>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('[data-filter]');
        const serviceCards = document.querySelectorAll('[data-category]');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                // Update active button style
                filterButtons.forEach(btn => {
                    if (btn.getAttribute('data-filter') === filter) {
                        btn.style.background = 'var(--soft-green)';
                        btn.style.color = 'var(--primary-green)';
                    } else {
                        btn.style.background = 'var(--light-gray)';
                        btn.style.color = 'var(--text-muted)';
                    }
                });

                // Filter cards
                serviceCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection