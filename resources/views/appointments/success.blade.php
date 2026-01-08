@extends('layouts.app')

@section('title', 'Appointment Confirmed - Safe Haven Wellness Center')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(63,170,122,0.95), rgba(44,95,141,0.95)), url('https://images.unsplash.com/photo-1606506728842-7329e8c0b7d2?w=1920&q=80') center/cover; min-height: 50vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <div class="mb-4">
            <i class="bi bi-check-circle-fill" style="font-size: 6rem; color: white; text-shadow: 0 4px 6px rgba(0,0,0,0.2);"></i>
        </div>
        <h1 class="display-3 fw-bold mb-3 text-white">Appointment Request Received!</h1>
        <p class="lead fs-4 text-white">Thank you for choosing Safe Haven Wellness Center.</p>
    </div>
</section>

<div class="spacer-lg"></div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="alert alert-success border-0 shadow-sm mb-4">
                            <p class="mb-0 fs-5">We have received your appointment request and will contact you within <strong>24 hours</strong> to confirm your appointment details.</p>
                        </div>

                        <div class="mt-4">
                            <h4 class="mb-4">
                                <span class="card-icon-small me-2">
                                    <i class="bi bi-list-check"></i>
                                </span>
                                What Happens Next?
                            </h4>
                            <ul class="list-unstyled text-start mt-4">
                                <li class="mb-4 d-flex align-items-start">
                                    <span class="badge bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-size: 1.2rem;">1</span>
                                    <div>
                                        <strong class="d-block mb-1">Confirmation Email</strong>
                                        <span class="text-muted">You'll receive a confirmation email shortly</span>
                                    </div>
                                </li>
                                <li class="mb-4 d-flex align-items-start">
                                    <span class="badge bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-size: 1.2rem;">2</span>
                                    <div>
                                        <strong class="d-block mb-1">Confirmation Call</strong>
                                        <span class="text-muted">Our team will call you to confirm your appointment</span>
                                    </div>
                                </li>
                                <li class="mb-4 d-flex align-items-start">
                                    <span class="badge bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-size: 1.2rem;">3</span>
                                    <div>
                                        <strong class="d-block mb-1">Intake Forms</strong>
                                        <span class="text-muted">Complete any necessary intake forms (we'll send them via email)</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start">
                                    <span class="badge bg-primary rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-size: 1.2rem;">4</span>
                                    <div>
                                        <strong class="d-block mb-1">Your Appointment</strong>
                                        <span class="text-muted">Attend your appointment at the scheduled time</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <hr class="my-5">

                        <div class="d-grid gap-3">
                            <a href="{{ route('home') }}" class="btn btn-primary btn-lg shadow">
                                <i class="bi bi-house-door"></i> Return to Home
                            </a>
                            <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-lg">
                                <i class="bi bi-info-circle"></i> Learn About Our Services
                            </a>
                        </div>

                        <div class="mt-4 p-4 bg-light rounded">
                            <p class="small text-muted mb-0 text-center">
                                <i class="bi bi-question-circle"></i>
                                Questions? Call us at <a href="tel:555-123-4567" class="fw-bold">(555) 123-4567</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection