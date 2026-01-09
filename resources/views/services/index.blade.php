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
            <div class="card h-100 border-0 shadow-sm" style="overflow: hidden; transition: all 0.3s ease;">
                @if($service->image)
                <div class="position-relative" style="overflow: hidden;">
                    <img src="{{ str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}"
                        class="card-img-top img-cover" style="height: 240px; transition: transform 0.3s ease;" alt="{{ $service->title }}">
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);"></div>
                </div>
                @else
                <div class="position-relative" style="overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=600&h=450&fit=crop&q=80"
                        class="card-img-top img-cover" style="height: 240px; transition: transform 0.3s ease;" alt="{{ $service->title }}">
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);"></div>
                </div>
                @endif
                <div class="card-body p-4 d-flex flex-column">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3 align-self-start px-3 py-2" style="font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px;">{{ ucfirst($service->category) }}</span>
                    <h5 class="card-title mb-3 fw-bold" style="font-size: 1.25rem;">{{ $service->title }}</h5>
                    <p class="card-text text-muted mb-4 flex-grow-1" style="line-height: 1.6;">{{ $service->description }}</p>
                    <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary w-100">Learn More <i class="bi bi-arrow-right ms-2"></i></a>
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

        // Add hover effects to service cards
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 12px 24px rgba(0,0,0,0.15)';
                const img = this.querySelector('img');
                if (img) img.style.transform = 'scale(1.05)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 1px 3px rgba(0,0,0,0.08)';
                const img = this.querySelector('img');
                if (img) img.style.transform = 'scale(1)';
            });
        });

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