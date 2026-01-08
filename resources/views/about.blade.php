@extends('layouts.app')

@section('title', 'About Us - Safe Haven Wellness Center')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(44,95,141,0.85), rgba(63,170,122,0.85)), url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1920&q=80') center/cover; min-height: 60vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-4 text-white">About Safe Haven Wellness Center</h1>
        <p class="lead fs-3 text-white">Where healing begins and hope is restored</p>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Mission Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-title mb-4">Our Mission</h2>
                <p class="lead">To provide compassionate, evidence-based mental health care in a safe and welcoming environment where every individual feels heard, respected, and supported on their journey to wellness.</p>
                <p class="fs-5 text-muted">At Safe Haven Wellness Center, we believe that mental health is fundamental to overall well-being. We are committed to breaking down barriers to mental health care and providing accessible, high-quality services to our community.</p>
            </div>
            <div class="col-lg-6">
                <div class="aspect-ratio aspect-4-3">
                    <img src="https://images.unsplash.com/photo-1527689368864-3a821dbccc34?w=800&q=80"
                        alt="Mental Health Support" class="img-cover rounded shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Values Section -->
<section class="section" style="background: linear-gradient(rgba(15, 123, 138, 0.35), rgba(15, 123, 138, 0.35)), url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=1920&q=80') center/cover; position: relative;">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="section-title text-white" style="text-shadow: 2px 2px 6px rgba(0,0,0,0.4);">Our Core Values</h2>
                <p class="section-subtitle text-white" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.4);">The principles that guide our care</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="h-100 text-center p-4" style="background: rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);">
                    <div class="card-icon mx-auto" style="color: var(--primary-blue); background: rgba(255, 255, 255, 0.9); width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-bottom: 1rem;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4 class="mt-3 text-white">Confidentiality</h4>
                    <p class="text-white" style="opacity: 0.95;">Your privacy and trust are paramount. We maintain the highest standards of confidentiality and HIPAA compliance.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 text-center p-4" style="background: rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);">
                    <div class="card-icon mx-auto" style="color: #E91E63; background: rgba(255, 255, 255, 0.9); width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-bottom: 1rem;">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h4 class="mt-3 text-white">Compassion</h4>
                    <p class="text-white" style="opacity: 0.95;">We approach every patient with empathy, understanding, and non-judgmental support.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 text-center p-4" style="background: rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);">
                    <div class="card-icon mx-auto" style="color: #FFC107; background: rgba(255, 255, 255, 0.9); width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-bottom: 1rem;">
                        <i class="bi bi-award"></i>
                    </div>
                    <h4 class="mt-3 text-white">Excellence</h4>
                    <p class="text-white" style="opacity: 0.95;">We use evidence-based practices and stay current with the latest research in mental health care.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 text-center p-4" style="background: rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);">
                    <div class="card-icon mx-auto" style="color: var(--primary-green); background: rgba(255, 255, 255, 0.9); width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-bottom: 1rem;">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4 class="mt-3 text-white">Inclusivity</h4>
                    <p class="text-white" style="opacity: 0.95;">We welcome individuals from all backgrounds and provide culturally sensitive care.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 text-center p-4" style="background: rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);">
                    <div class="card-icon mx-auto" style="color: #9C27B0; background: rgba(255, 255, 255, 0.9); width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-bottom: 1rem;">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h4 class="mt-3 text-white">Growth</h4>
                    <p class="text-white" style="opacity: 0.95;">We believe in the potential for healing and growth in every individual.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 text-center p-4" style="background: rgba(255, 255, 255, 0.25); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-radius: 16px; border: 1px solid rgba(255, 255, 255, 0.4); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);">
                    <div class="card-icon mx-auto" style="color: #00BCD4; background: rgba(255, 255, 255, 0.9); width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-bottom: 1rem;">
                        <i class="bi bi-globe"></i>
                    </div>
                    <h4 class="mt-3 text-white">Accessibility</h4>
                    <p class="text-white" style="opacity: 0.95;">We strive to make quality mental health care accessible to everyone through flexible options and insurance acceptance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Story Section -->
<section class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2">
                <h2 class="section-title mb-4">Our Story</h2>
                <p class="fs-5">Safe Haven Wellness Center was founded with a simple yet powerful vision: to create a mental health facility where people feel truly safe to explore their feelings, confront their challenges, and work towards healing.</p>

                <p class="text-muted">Recognizing the growing need for accessible, compassionate mental health services in our community, our founders assembled a team of dedicated professionals who share a commitment to evidence-based care and patient-centered treatment.</p>

                <p class="text-muted">Today, we serve hundreds of individuals and families, offering a comprehensive range of mental health services from individual therapy to specialized treatment programs. Our approach combines clinical expertise with genuine compassion, creating an environment where healing can truly take place.</p>

                <p class="text-muted">We continue to grow and evolve, always keeping our core mission at the forefront: to provide the highest quality mental health care in a setting where every person is valued, respected, and supported.</p>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="aspect-ratio aspect-4-3">
                    <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80"
                        alt="Our Team" class="img-cover rounded shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Stats Section -->
<section class="section" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--light-blue) 50%, var(--primary-green) 100%); color: white;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <h2 class="display-3 fw-bold text-white">15+</h2>
                <p class="lead text-white">Years of Service</p>
            </div>
            <div class="col-md-3 mb-4">
                <h2 class="display-3 fw-bold text-white">25+</h2>
                <p class="lead text-white">Expert Professionals</p>
            </div>
            <div class="col-md-3 mb-4">
                <h2 class="display-3 fw-bold text-white">10K+</h2>
                <p class="lead text-white">Lives Touched</p>
            </div>
            <div class="col-md-3 mb-4">
                <h2 class="display-3 fw-bold text-white">98%</h2>
                <p class="lead text-white">Patient Satisfaction</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Accreditations Section -->
<section class="section bg-light">
    <div class="container text-center">
        <h2 class="section-title mb-2">Accreditations & Affiliations</h2>
        <p class="section-subtitle text-muted mb-5">We maintain the highest standards of professional excellence</p>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <span class="card-icon-small mx-auto">
                        <i class="bi bi-patch-check"></i>
                    </span>
                    <h6 class="mt-3">Joint Commission Accredited</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <span class="card-icon-small mx-auto">
                        <i class="bi bi-shield-check"></i>
                    </span>
                    <h6 class="mt-3">HIPAA Compliant</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <span class="card-icon-small mx-auto">
                        <i class="bi bi-award"></i>
                    </span>
                    <h6 class="mt-3">APA Member Facility</h6>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-4 border-0 shadow-sm">
                    <span class="card-icon-small mx-auto">
                        <i class="bi bi-star-fill"></i>
                    </span>
                    <h6 class="mt-3">Evidence-Based Practice</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- CTA Section -->
<section class="section cta-overlay" style="background: linear-gradient(rgba(44,95,141,0.9), rgba(63,170,122,0.9)), url('https://images.unsplash.com/photo-1512678080530-7760d81faba6?w=1920&q=80') center/cover; color: white;">
    <div class="container cta-content text-center">
        <h2 class="display-5 fw-bold mb-4 text-white">Ready to Begin Your Journey?</h2>
        <p class="lead mb-4 text-white">Take the first step towards better mental health today.</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="{{ route('appointments.create') }}" class="btn btn-light btn-lg shadow">
                <i class="bi bi-calendar-check"></i> Schedule Appointment
            </a>
            <a href="{{ route('contact') }}" class="btn btn-success btn-lg shadow">
                <i class="bi bi-envelope"></i> Contact Us
            </a>
        </div>
    </div>
</section>
@endsection