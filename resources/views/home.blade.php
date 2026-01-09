@extends('layouts.app')

@section('title', 'Global Mental Healthcare Association - Your Trusted Guide to Mental Health')
@section('description', 'Professional mental health services in a safe, supportive environment. Expert therapists, comprehensive treatment programs, and telehealth options available.')

@section('content')
<!-- Hero Section -->
<section style="background: linear-gradient(rgba(15, 123, 138, 0.4), rgba(15, 123, 138, 0.4)), url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1920&q=80') center/cover; position: relative; min-height: 100vh; display: flex; align-items: center; background-attachment: fixed;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="mb-4" style="color: #FFFFFF; text-shadow: 2px 2px 8px rgba(0,0,0,0.5);">Your trusted guide to<br>mental health & wellness</h1>
                <p class="lead mb-0" style="color: #FFFFFF; font-size: 1.25rem; text-shadow: 1px 1px 6px rgba(0,0,0,0.5);">We empower you with the knowledge and skills you need to strengthen your mental health and well-being</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-md"></div>

<!-- Key Features Grid -->
<section class="container">
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=300&fit=crop&q=80" alt="Guidance" class="img-fluid rounded mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                <h6 class="fw-bold mb-2">Guidance you can trust</h6>
                <p class="text-muted small">Find trustworthy information about mental health that you can use to make better decisions.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=400&h=300&fit=crop&q=80" alt="Skills" class="img-fluid rounded mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                <h6 class="fw-bold mb-2">Skills for life success</h6>
                <p class="text-muted small">Build skills to manage your emotions, strengthen relationships, and cope with challenges.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <img src="https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=400&h=300&fit=crop&q=80" alt="Strategies" class="img-fluid rounded mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                <h6 class="fw-bold mb-2">Strategies to feel better</h6>
                <p class="text-muted small">Learn how to improve your mental health and well-being—and help your loved ones do the same.</p>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="text-center">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=300&fit=crop&q=80" alt="Support" class="img-fluid rounded mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                <h6 class="fw-bold mb-2">Support you can rely on</h6>
                <p class="text-muted small">We're here for you, day or night, whenever you need guidance, encouragement, or support.</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Quick Navigation Pills -->
<section class="container">
    <div class="text-center mb-4">
        <h2 class="h4 fw-bold mb-3">Find the help you need today</h2>
        <p class="text-muted">Pick a topic below that you'd like to explore:</p>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
        <a href="{{ route('services.index') }}?category=anxiety" class="badge-custom text-decoration-none">Anxiety</a>
        <a href="{{ route('services.index') }}?category=depression" class="badge-custom text-decoration-none">Depression</a>
        <a href="{{ route('services.index') }}?category=stress" class="badge-custom text-decoration-none">Stress</a>
        <a href="{{ route('services.index') }}?category=trauma" class="badge-custom text-decoration-none">PTSD & Trauma</a>
        <a href="{{ route('services.index') }}?category=therapy" class="badge-custom text-decoration-none">Individual Therapy</a>
        <a href="{{ route('services.index') }}?category=couples" class="badge-custom text-decoration-none">Couples Therapy</a>
        <a href="{{ route('services.index') }}?category=family" class="badge-custom text-decoration-none">Family Therapy</a>
        <a href="{{ route('services.index') }}?category=addiction" class="badge-custom text-decoration-none">Addiction</a>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Featured Services Section - HelpGuide Style -->
<section class="container">
    <div class="mb-4">
        <h2 class="h4 fw-bold mb-3">Our Services</h2>
        <p class="text-muted">Professional mental health support tailored to your needs</p>
    </div>
    <div class="row g-4">
        @forelse($featuredServices as $service)
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm" style="overflow: hidden; transition: all 0.3s ease;">
                <div class="position-relative" style="overflow: hidden; height: 200px;">
                    @if($service->image)
                    <img src="{{ str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}"
                        class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $service->title }}">
                    @else
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=300&fit=crop&q=80"
                        class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;" alt="{{ $service->title }}">
                    @endif
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background: linear-gradient(180deg, transparent 60%, rgba(0,0,0,0.3) 100%);"></div>
                </div>
                <div class="card-body p-4 d-flex flex-column">
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2 align-self-start"
                        style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">{{ $service->category ?? 'THERAPY' }}</span>
                    <h5 class="card-title mb-2 fw-bold" style="font-size: 1.1rem;">{{ $service->title }}</h5>
                    <p class="card-text text-muted small flex-grow-1" style="line-height: 1.6;">{{ Str::limit($service->description, 100) }}</p>
                    <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary btn-sm w-100 mt-2">
                        Learn More <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-6">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=400&h=300&fit=crop&q=80" class="img-fluid h-100" style="object-fit: cover;" alt="Individual Therapy">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <span class="badge-custom mb-2">THERAPY</span>
                            <h5 class="card-title mb-2">Individual Therapy</h5>
                            <p class="card-text text-muted small">One-on-one sessions in a safe, supportive environment tailored to your personal journey.</p>
                            <a href="{{ route('services.index') }}" class="btn btn-sm btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="https://images.unsplash.com/photo-1516302752625-fcc3c50ae61f?w=400&h=300&fit=crop&q=80" class="img-fluid h-100" style="object-fit: cover;" alt="Couples Therapy">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <span class="badge-custom mb-2">RELATIONSHIPS</span>
                            <h5 class="card-title mb-2">Couples Therapy</h5>
                            <p class="card-text text-muted small">Strengthen your relationship and improve communication with your partner.</p>
                            <a href="{{ route('services.index') }}" class="btn btn-sm btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    <div class="mt-4">
        <a href="{{ route('services.index') }}" class="btn btn-outline-primary">View All Services</a>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Team Section - Enhanced Professional Design -->
<section class="container">
    <div class="text-center mb-5">
        <h2 class="h2 fw-bold mb-3">Our Professionals</h2>
        <p class="text-muted fs-5">Licensed therapists dedicated to your wellness journey</p>
    </div>
    <div class="row g-4 justify-content-center">
        @forelse($featuredStaff as $member)
        <div class="col-6 col-md-4 col-lg-3">
            <a href="{{ route('staff.show', $member->slug) }}" class="text-decoration-none">
                <div class="staff-card h-100">
                    <div class="staff-image-wrapper mb-3">
                        @if($member->photo)
                        <img src="{{ str_starts_with($member->photo, 'http') ? $member->photo : asset('storage/' . $member->photo) }}" class="staff-image" alt="{{ $member->name }}">
                        @else
                        <img src="{{ $member->image_url ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop&q=80' }}" class="staff-image" alt="{{ $member->name }}">
                        @endif
                        <div class="staff-overlay">
                            <div class="staff-overlay-content">
                                <i class="bi bi-arrow-right-circle fs-2"></i>
                                <p class="mb-0 mt-2 small">View Profile</p>
                            </div>
                        </div>
                    </div>
                    <div class="staff-info text-center">
                        <h6 class="mb-1 fw-bold staff-name">{{ $member->name }}</h6>
                        <p class="text-muted mb-2 small staff-title">{{ $member->title }}</p>
                        <p class="text-primary small mb-0 staff-specialization">
                            <i class="bi bi-award me-1"></i>{{ $member->specialization }}
                        </p>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="bi bi-people fs-1 text-muted mb-3"></i>
                <p class="text-muted">Our team profiles will be available soon.</p>
            </div>
        </div>
        @endforelse
    </div>
    @if($featuredStaff->count() > 0)
    <div class="text-center mt-5">
        <a href="{{ route('staff.index') }}" class="btn btn-primary btn-lg px-5">
            <i class="bi bi-people me-2"></i>Meet All Team Members
        </a>
    </div>
    @endif
</section>

<style>
    .staff-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 1.25rem;
        border-radius: 16px;
        background: white;
    }

    .staff-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .staff-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        aspect-ratio: 1;
    }

    .staff-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .staff-card:hover .staff-image {
        transform: scale(1.1);
    }

    .staff-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(15, 123, 138, 0.9), rgba(102, 181, 140, 0.9));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .staff-card:hover .staff-overlay {
        opacity: 1;
        f
    }

    .staff-overlay-content {
        color: white;
        text-align: center;
        transform: translateY(10px);
        transition: transform 0.3s ease;
    }

    .staff-card:hover .staff-overlay-content {
        transform: translateY(0);
    }

    .staff-info {
        padding-top: 0.5rem;
    }

    .staff-name {
        color: var(--text-dark);
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .staff-card:hover .staff-name {
        color: var(--primary-blue);
    }

    .staff-title {
        font-size: 0.875rem;
        line-height: 1.4;
    }

    .staff-specialization {
        font-size: 0.8rem;
        font-weight: 500;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .staff-card {
            padding: 1rem;
        }

        .staff-image-wrapper {
            border-radius: 10px;
        }

        .staff-name {
            font-size: 0.9rem;
        }

        .staff-title {
            font-size: 0.8rem;
        }

        .staff-specialization {
            font-size: 0.75rem;
        }
    }

    @media (min-width: 1200px) {
        .staff-card {
            padding: 1.5rem;
        }

        .staff-name {
            font-size: 1.1rem;
        }
    }
</style>

<div class="spacer-lg"></div>

<!-- Testimonials - Simplified -->
@if($testimonials->count() > 0)
<section class="py-5" style="background: var(--light-gray);">
    <div class="container">
        <div class="mb-4 text-center">
            <h2 class="h4 fw-bold mb-3">How Global Mental Healthcare Association changes lives</h2>
        </div>
        <div class="row g-4">
            @foreach($testimonials->take(3) as $testimonial)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="mb-3" style="font-style: italic; color: var(--text-dark);">"{{ $testimonial->content }}"</p>
                        <p class="small text-muted mb-0">{{ $testimonial->patient_initial ?? $testimonial->patient_name }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="spacer-lg"></div>
@endif

<!-- Recent Blog Posts - HelpGuide Layout -->
@if($recentPosts->count() > 0)
<section class="container">
    <div class="mb-4">
        <h2 class="h4 fw-bold mb-3">Wellness Resources</h2>
        <p class="text-muted">Helpful articles and insights on mental health and self-care</p>
    </div>
    <div class="row g-4">
        @foreach($recentPosts as $post)
        <div class="col-md-6">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5">
                        @if($post->featured_image)
                        <img src="{{ str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" class="img-fluid h-100" style="object-fit: cover;" alt="{{ $post->title }}">
                        @else
                        <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?w=400&h=300&fit=crop&q=80" class="img-fluid h-100" style="object-fit: cover;" alt="{{ $post->title }}">
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="card-body h-100 d-flex flex-column">
                            <span class="badge-custom mb-2 d-inline-block">{{ $post->category }}</span>
                            <h6 class="card-title mb-2">{{ $post->title }}</h6>
                            <p class="card-text text-muted small flex-grow-1">{{ Str::limit($post->excerpt, 80) }}</p>
                            <div class="d-flex align-items-center gap-3 mb-2 text-muted" style="font-size: 0.75rem;">
                                @if($post->author)
                                <span><i class="bi bi-person"></i> {{ $post->author->name }}</span>
                                @endif
                                <span><i class="bi bi-calendar3"></i> {{ $post->published_at->format('M d, Y') }}</span>
                                <span><i class="bi bi-eye"></i> {{ number_format($post->views) }}</span>
                            </div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-primary small fw-medium text-decoration-none">Read Article →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4">
        <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">Explore All Resources</a>
    </div>
</section>

<div class="spacer-lg"></div>
@endif

<!-- Newsletter Signup -->
<section class="container">
    <div class="card border-0" style="background: var(--soft-blue);">
        <div class="card-body text-center py-5">
            <h3 class="h5 fw-bold mb-3">Join Our Newsletter</h3>
            <p class="text-muted mb-4">Get mental health tips and insights delivered to your inbox every other week.</p>
            <form class="row g-2 justify-content-center">
                <div class="col-auto" style="min-width: 300px;">
                    <input type="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effects to service cards
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 12px 24px rgba(0,0,0,0.15)';
                const img = this.querySelector('img');
                if (img) img.style.transform = 'scale(1.1)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 1px 3px rgba(0,0,0,0.08)';
                const img = this.querySelector('img');
                if (img) img.style.transform = 'scale(1)';
            });
        });
    });
</script>
@endsection