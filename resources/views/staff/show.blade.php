@extends('layouts.app')

@section('title', $member->name . ' - Safe Haven Wellness Center')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(44,95,141,0.8), rgba(63,170,122,0.8)), url('https://images.unsplash.com/photo-1573497620053-ea5300f94f21?w=1920&q=80') center/cover; min-height: 60vh; display: flex; align-items: center; color: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center mb-4 mb-lg-0">
                @if($member->photo)
                <div class="position-relative d-inline-block">
                    <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}"
                        class="rounded-circle border border-5 border-white shadow-lg" style="width: 300px; height: 300px; object-fit: cover;">
                </div>
                @else
                <div style="width: 300px; height: 300px; background: rgba(255,255,255,0.95); 
                            border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; border: 5px solid white; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <i class="bi bi-person-circle" style="font-size: 12rem; color: var(--primary-blue);"></i>
                </div>
                @endif
            </div>
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-3 text-white">{{ $member->name }}</h1>
                <h4 class="mb-3 text-white">{{ $member->title }}</h4>
                <p class="lead text-white mb-3">{{ $member->specialization }}</p>

                @if($member->credentials && is_array($member->credentials))
                <div class="mb-3">
                    @foreach($member->credentials as $credential)
                    <span class="badge bg-white text-primary me-2 mb-2 px-3 py-2">{{ $credential }}</span>
                    @endforeach
                </div>
                @endif

                @if($member->accepting_patients)
                <div class="alert alert-success d-inline-block">
                    <i class="bi bi-check-circle-fill"></i> <strong>Accepting New Patients</strong>
                </div>
                @endif

                <div class="mt-4">
                    <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg shadow">
                        <i class="bi bi-calendar-check"></i> Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Bio Section -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="section-title mb-4">About {{ explode(' ', $member->name)[0] }}</h2>
                <div class="content fs-5">
                    {!! nl2br(e($member->bio)) !!}
                </div>

                @if($member->expertise && is_array($member->expertise) && count($member->expertise) > 0)
                <div class="card mt-5 bg-light border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="mb-4">
                            <span class="card-icon-small me-2">
                                <i class="bi bi-star-fill"></i>
                            </span>
                            Areas of Expertise
                        </h4>
                        <div class="row">
                            @foreach($member->expertise as $area)
                            <div class="col-md-6 mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i><span class="fs-6">{{ $area }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if($member->languages && is_array($member->languages) && count($member->languages) > 0)
                <div class="card mt-4 border-0 shadow-sm" style="background: linear-gradient(135deg, rgba(44,95,141,0.1), rgba(63,170,122,0.1));">
                    <div class="card-body p-4">
                        <h5>
                            <span class="card-icon-small me-2">
                                <i class="bi bi-translate"></i>
                            </span>
                            Languages Spoken
                        </h5>
                        <p class="mb-0 mt-3">
                            @foreach($member->languages as $language)
                            <span cla shadow-sm">
                                <div class="card-body p-4
                        </p>
                    </div>
                </div>
                @endif
            </div>

            <div class=" col-lg-4">
                                    <!-- Contact Card -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Contact Information</h5>

                                            @if($member->email)
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="bi bi-envelope-fill text-primary me-3 fs-5"></i>
                                                <div>
                                                    <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                                </div>
                                            </div>
                                            @endif

                                            @if($member->phone)
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="bi bi-telephone-fill text-primary me-3 fs-5"></i>
                                                <div>
                                                    <a href="tel:{{ $member->phone }}">{{ $member->phone }}</a>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="d-flex align-items-start">
                                                <i class="bi bi-geo-alt-fill text-primary me-3 fs-5"></i>
                                                <div>
                                                    <p class="mb-0">Safe Haven Wellness Center<br>
                                                        123 Wellness Ave, Suite 100</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Appointment Card -->
                                    <div class="card shadow-sm" style="background: linear-gradient(135deg, var(--primary-green), var(--light-green)); color: white;">
                                        <div class="card-body text-center p-4">
                                            <h5 class="card-title text-white">Schedule with {{ explode(' ', $member->name)[0] }}</h5>
                                            <p class="text-white mb-3">Book your appointment today</p>
                                            <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg w-100 shadow">
                                                <i class="bi bi-calendar-check"></i> Book Now
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Office Hours -->
                                    <div class="card mt-4 shadow-sm">
                                        <div class="card-body p-4">
                                            <h5 class="card-title mb-3">Office Hours</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-2"><strong>Monday - Friday:</strong> 8:00 AM - 6:00 PM</li>
                                                <li class="mb-2"><strong>Saturday:</strong> 9:00 AM - 2:00 PM</li>
                                                <li><strong>Sunday:</strong> Closed</li>
                                            </ul>
                                            <hr>
                                            <p class="small mb-0 text-muted">
                                                <i class="bi bi-info-circle"></i> Telehealth appointments available outside regular hours
                                            </p>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
</section>
@endsection