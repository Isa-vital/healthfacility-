@extends('layouts.app')

@section('title', 'Our Team - Safe Haven Wellness Center')
@section('description', 'Meet our team of experienced mental health professionals dedicated to supporting your wellness journey.')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=1920&q=80'); min-height: 50vh;">
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-semibold mb-4">Meet Our Team</h1>
                <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">Compassionate professionals dedicated to your wellness journey.</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Team Grid -->
<section class="container">
    @if($specializations->count() > 0)
    <div class="row mb-5">
        <div class="col-12 text-center">
            <div class="d-inline-flex gap-2 flex-wrap justify-content-center">
                <button class="badge-custom" style="border: none; cursor: pointer;" data-filter="all">All Team Members</button>
                @foreach($specializations as $specialization)
                <button class="badge-custom" style="border: none; cursor: pointer; background: var(--light-gray); color: var(--text-muted);" data-filter="{{ $specialization }}">{{ $specialization }}</button>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div class="row g-4">
        @forelse($staff as $member)
        <div class="col-md-6 col-lg-3" data-specialization="{{ $member->specialization }}">
            <div class="card h-100">
                @if($member->photo)
                <img src="{{ asset('storage/' . $member->photo) }}" class="aspect-1-1 img-cover" alt="{{ $member->name }}">
                @else
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&h=400&fit=crop&q=80" class="aspect-1-1 img-cover" alt="{{ $member->name }}">
                @endif
                <div class="card-body text-center p-4">
                    <h5 class="card-title mb-1">{{ $member->name }}</h5>
                    <p class="text-muted mb-2" style="font-size: 0.9rem;">{{ $member->title }}</p>
                    <p class="small text-muted mb-3">{{ $member->specialization }}</p>

                    @if($member->accepting_patients)
                    <span class="badge-custom d-inline-block mb-3" style="font-size: 0.8rem;">
                        <i class="bi bi-check-circle"></i> Accepting Patients
                    </span>
                    @endif

                    <a href="{{ route('staff.show', $member->slug) }}" class="btn btn-success btn-sm">View Profile</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-people" style="font-size: 4rem; color: var(--primary-blue); opacity: 0.3;"></i>
            <p class="text-muted mt-3">Team profiles will be available soon.</p>
        </div>
        @endforelse
    </div>
</section>

<div class="spacer-lg"></div>

<!-- CTA Section -->
<section class="container">
    <div class="cta-overlay" style="background-image: url('https://images.unsplash.com/photo-1516302752625-fcc3c50ae61f?w=1920&q=80');">
        <div class="container cta-content text-center py-5">
            <h2 class="display-5 fw-semibold mb-4">Ready to Start Your Journey?</h2>
            <p class="lead mb-5" style="max-width: 600px; margin: 0 auto; opacity: 0.95;">Book an appointment with one of our caring professionals today.</p>
            <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg px-5">Schedule Appointment</a>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('[data-filter]');
        const staffCards = document.querySelectorAll('[data-specialization]');

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
                staffCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-specialization') === filter) {
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