@extends('layouts.app')

@section('title', $post->title . ' - Global Mental Healthcare Association')

@section('content')
<!-- Compact Header -->
<section class="py-3" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-green) 100%);">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog.index') }}" class="text-white text-decoration-none">Resources</a></li>
                        <li class="breadcrumb-item active text-white">Article</li>
                    </ol>
                </nav>
                <span class="badge bg-white text-primary mb-2 px-2 py-1" style="font-size: 0.75rem;">{{ ucfirst($post->category) }}</span>
                <h1 class="h3 fw-bold mb-2 text-white">{{ $post->title }}</h1>
                <div class="d-flex align-items-center gap-3 text-white" style="font-size: 0.8rem; opacity: 0.9;">
                    @if($post->author)
                    <span><i class="bi bi-person-fill me-1"></i>{{ $post->author->name }}</span>
                    @endif
                    <span><i class="bi bi-calendar me-1"></i>{{ $post->published_at->format('M j, Y') }}</span>
                    <span><i class="bi bi-eye me-1"></i>{{ $post->views }} views</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-3">
    <div class="container">
        <div class="row g-3">
            <!-- Main Content -->
            <div class="col-lg-8">
                @if($post->featured_image)
                <div class="position-relative mb-2 rounded-3 overflow-hidden">
                    <img src="{{ str_starts_with($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-100" style="max-height: 300px; object-fit: cover;">
                </div>
                @endif

                <div class="mb-2 text-muted" style="font-size: 1rem; line-height: 1.6;">
                    {{ $post->excerpt }}
                </div>

                <article class="content mb-3" style="font-size: 0.92rem; line-height: 1.7; color: var(--text-dark);">
                    {!! nl2br(e($post->content)) !!}
                </article>

                @if($post->tags && is_array($post->tags) && count($post->tags) > 0)
                <div class="mb-2 pb-2 border-bottom">
                    <strong class="text-muted d-block mb-1" style="font-size: 0.8rem;">Tags:</strong>
                    @foreach($post->tags as $tag)
                    <span class="badge bg-primary bg-opacity-10 text-primary me-1 mb-1" style="font-weight: 500; padding: 0.3rem 0.6rem; font-size: 0.75rem;">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif

                <!-- Disclaimer -->
                <div class="alert border-0 mb-0 p-2" style="background: var(--soft-blue); border-left: 3px solid var(--primary-blue) !important;">
                    <small style="font-size: 0.78rem;"><i class="bi bi-info-circle-fill me-1"></i><strong></strong> </small>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Related Articles -->
                @if($relatedPosts->count() > 0)
                <div class="mb-3">
                    <h6 class="fw-bold mb-3">Related Articles</h6>
                    @foreach($relatedPosts->take(3) as $related)
                    <div class="mb-3 pb-3 border-bottom">
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-2" style="font-size: 0.75rem;">{{ ucfirst($related->category) }}</span>
                        <h6 class="mb-2"><a href="{{ route('blog.show', $related->slug) }}" class="text-decoration-none text-dark">{{ Str::limit($related->title, 60) }}</a></h6>
                        <a href="{{ route('blog.show', $related->slug) }}" class="text-decoration-none" style="font-size: 0.875rem;">Read More <i class="bi bi-arrow-right"></i></a>
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Quick Actions -->
                <div class="p-3 rounded-3" style="background: var(--off-white);">
                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-calendar-check-fill" style="color: var(--primary-blue); font-size: 1.25rem;"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Book Appointment</h6>
                                <small class="text-muted">Schedule with a therapist</small>
                            </div>
                        </div>
                        <a href="{{ route('appointments.create') }}" class="btn btn-primary w-100">
                            Get Started
                        </a>
                    </div>

                    <hr>

                    <div>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-telephone-fill" style="color: var(--primary-green); font-size: 1.25rem;"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">24/7 Crisis Line</h6>
                                <small class="text-muted">Immediate support available</small>
                            </div>
                        </div>
                        <a href="tel:0773251311" class="btn w-100" style="background: var(--primary-green); color: white; font-weight: 600;">
                            Call 0773 251 311
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection