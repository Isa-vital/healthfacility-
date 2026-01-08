@extends('layouts.app')

@section('title', 'Mental Health Resources - Safe Haven Wellness Center')
@section('description', 'Explore our library of mental health articles, wellness tips, and educational resources to support your journey.')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1920&q=80'); min-height: 60vh;">
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-semibold mb-4">Wellness Resources</h1>
                <p class="lead mb-4" style="font-size: 1.3rem; opacity: 0.95;">Evidence-based articles and insights to support your mental health journey.</p>
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <span class="badge-custom" style="background: rgba(255,255,255,0.2); color: white; font-size: 0.9rem;">
                        <i class="bi bi-book"></i> Self-Care Tips
                    </span>
                    <span class="badge-custom" style="background: rgba(255,255,255,0.2); color: white; font-size: 0.9rem;">
                        <i class="bi bi-lightbulb"></i> Expert Advice
                    </span>
                    <span class="badge-custom" style="background: rgba(255,255,255,0.2); color: white; font-size: 0.9rem;">
                        <i class="bi bi-heart"></i> Wellness Strategies
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Category Filter -->
<section class="container">
    @if($categories->count() > 0)
    <div class="row mb-5">
        <div class="col-12">
            <div class="card p-4" style="background: var(--light-gray); border: none;">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <h5 class="mb-1"><i class="bi bi-funnel"></i> Browse by Topic</h5>
                        <p class="text-muted mb-0 small">Find articles that matter to you</p>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-grid"></i> All Articles
                        </a>
                        @foreach($categories as $category)
                        <a href="{{ route('blog.index', ['category' => $category]) }}" class="btn btn-sm btn-outline-primary">
                            {{ ucfirst($category) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Featured Post -->
    @if($posts->isNotEmpty() && $posts->first())
    <div class="row mb-5">
        <div class="col-12">
            <div class="card overflow-hidden" style="border: none; box-shadow: 0 4px 24px rgba(0,0,0,0.08);">
                <div class="row g-0">
                    <div class="col-md-6">
                        @if($posts->first()->featured_image)
                        <img src="{{ asset('storage/' . $posts->first()->featured_image) }}" class="img-cover" style="height: 100%; min-height: 400px;" alt="{{ $posts->first()->title }}">
                        @else
                        <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?w=800&h=600&fit=crop&q=80" class="img-cover" style="height: 100%; min-height: 400px;" alt="{{ $posts->first()->title }}">
                        @endif
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="card-body p-5">
                            <span class="badge-custom mb-3 d-inline-block">
                                <i class="bi bi-star-fill"></i> Featured Article
                            </span>
                            <h2 class="h3 mb-3">{{ $posts->first()->title }}</h2>
                            <p class="text-muted mb-4" style="font-size: 1.05rem;">{{ $posts->first()->excerpt }}</p>
                            <div class="d-flex align-items-center gap-3 mb-4 text-muted small">
                                <span><i class="bi bi-calendar3"></i> {{ $posts->first()->published_at->format('M d, Y') }}</span>
                                <span><i class="bi bi-eye"></i> {{ number_format($posts->first()->views) }} views</span>
                                <span><i class="bi bi-clock"></i> 5 min read</span>
                            </div>
                            <a href="{{ route('blog.show', $posts->first()->slug) }}" class="btn btn-primary btn-lg">
                                Read Full Article <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Articles Grid -->
    <div class="row g-4 mb-5">
        @forelse($posts->skip(1) as $post)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top aspect-16-9 img-cover" alt="{{ $post->title }}">
                @else
                <img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?w=600&h=338&fit=crop&q=80" class="card-img-top aspect-16-9 img-cover" alt="{{ $post->title }}">
                @endif
                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <span class="badge-custom">{{ ucfirst($post->category) }}</span>
                        <span class="text-muted small">
                            <i class="bi bi-clock"></i> 5 min
                        </span>
                    </div>
                    <h5 class="card-title mb-3">{{ $post->title }}</h5>
                    <p class="card-text text-muted mb-3 flex-grow-1" style="font-size: 0.95rem;">{{ Str::limit($post->excerpt, 120) }}</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <span class="text-muted small">
                            <i class="bi bi-calendar3"></i> {{ $post->published_at->format('M d') }}
                        </span>
                        <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        @if($posts->isEmpty())
        <div class="col-12 text-center py-5">
            <i class="bi bi-journal-text" style="font-size: 4rem; color: var(--primary-blue); opacity: 0.3;"></i>
            <h3 class="mt-4">No Articles Yet</h3>
            <p class="text-muted">Check back soon for mental health resources and wellness tips.</p>
        </div>
        @endif
        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    @endif
</section>

<div class="spacer-lg"></div>

<!-- Crisis Resources Section -->
<section class="section" style="background: var(--soft-blue);">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title">Need Immediate Help?</h2>
                <p class="section-subtitle">Crisis support is available 24/7. You're not alone.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center p-4" style="border: 2px solid var(--primary-blue);">
                    <div class="card-icon-small mx-auto mb-3" style="width: 64px; height: 64px; font-size: 2rem;">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h5 class="mb-3">Crisis Lifeline</h5>
                    <p class="display-6 mb-3" style="color: var(--primary-blue); font-weight: 600;">988</p>
                    <p class="text-muted mb-4">Free, confidential support for people in distress. Available 24/7 for crisis intervention and suicide prevention.</p>
                    <a href="tel:988" class="btn btn-primary w-100">Call Now</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4" style="border: 2px solid var(--primary-green);">
                    <div class="card-icon-small mx-auto mb-3" style="width: 64px; height: 64px; font-size: 2rem; background: var(--soft-green); color: var(--primary-green);">
                        <i class="bi bi-chat-dots-fill"></i>
                    </div>
                    <h5 class="mb-3">Crisis Text Line</h5>
                    <p class="h5 mb-3" style="color: var(--primary-green); font-weight: 600;">Text HOME to 741741</p>
                    <p class="text-muted mb-4">Connect with a trained Crisis Counselor via text message. Free, 24/7 support when you need it most.</p>
                    <a href="sms:741741?body=HOME" class="btn btn-success w-100">Send Text</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-4" style="border: 2px solid #E57373;">
                    <div class="card-icon-small mx-auto mb-3" style="width: 64px; height: 64px; font-size: 2rem; background: #FFEBEE; color: #E57373;">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    </div>
                    <h5 class="mb-3">Emergency Services</h5>
                    <p class="display-6 mb-3" style="color: #E57373; font-weight: 600;">911</p>
                    <p class="text-muted mb-4">If you or someone you know is in immediate danger or experiencing a medical emergency, call 911 right away.</p>
                    <a href="tel:911" class="btn w-100" style="background: #E57373; color: white;">Call 911</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Newsletter Signup -->
<section class="container">
    <div class="cta-overlay" style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1920&q=80');">
        <div class="container cta-content text-center py-5">
            <i class="bi bi-envelope" style="font-size: 3rem; opacity: 0.9; margin-bottom: 1rem;"></i>
            <h2 class="display-5 fw-semibold mb-4">Stay Informed</h2>
            <p class="lead mb-5" style="max-width: 600px; margin: 0 auto; opacity: 0.95;">Get the latest mental health tips and wellness resources delivered to your inbox.</p>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email" style="background: rgba(255,255,255,0.95);">
                        <button type="submit" class="btn btn-light btn-lg px-4" style="white-space: nowrap;">Subscribe</button>
                    </form>
                    <p class="small mt-3" style="opacity: 0.8;">We respect your privacy. Unsubscribe anytime.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>
@endsection