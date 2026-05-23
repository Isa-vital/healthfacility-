@extends('layouts.app')

@section('title', 'Insurance Information - Global Mental Healthcare Association')
@section('description', 'Learn about insurance coverage, accepted plans, payment options, and financial assistance for mental health services at Global Mental Healthcare Association.')

@section('content')
<!-- Hero -->
<section class="hero-section" style="background: linear-gradient(rgba(44,95,141,0.55), rgba(63,170,122,0.45)), url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1920&q=80') center/cover; min-height: 50vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-3 text-white">Insurance & Payment</h1>
        <p class="lead fs-4 text-white mb-0">Accessible care, transparent pricing, and flexible payment options.</p>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Intro -->
<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
                <h2 class="section-title mb-3">We Believe Cost Should Never Be a Barrier to Care</h2>
                <p class="section-subtitle">
                    Global Mental Healthcare Association works with a wide range of insurance providers and offers
                    multiple payment options to ensure every individual can access the support they deserve.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Accepted Insurance -->
<section class="section bg-light-gray">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title">Accepted Insurance Plans</h2>
                <p class="text-muted">We are in-network with many major providers. Please contact us to verify coverage for your specific plan.</p>
            </div>
        </div>
        <div class="row g-4">
            @php
                $plans = [
                    ['name' => 'UAP Old Mutual', 'icon' => 'shield-check'],
                    ['name' => 'Jubilee Health Insurance', 'icon' => 'shield-check'],
                    ['name' => 'AAR Insurance', 'icon' => 'shield-check'],
                    ['name' => 'ICEA LION Health', 'icon' => 'shield-check'],
                    ['name' => 'Prudential Health', 'icon' => 'shield-check'],
                    ['name' => 'Liberty Health', 'icon' => 'shield-check'],
                    ['name' => 'CIC Insurance Group', 'icon' => 'shield-check'],
                    ['name' => 'Britam Health', 'icon' => 'shield-check'],
                ];
            @endphp
            @foreach($plans as $plan)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 text-center p-4">
                    <div class="card-icon-small mx-auto mb-3" style="background: var(--soft-green); color: var(--primary-green);">
                        <i class="bi bi-{{ $plan['icon'] }}"></i>
                    </div>
                    <h6 class="mb-0 fw-bold">{{ $plan['name'] }}</h6>
                </div>
            </div>
            @endforeach
        </div>
        <p class="text-center text-muted mt-4 mb-0">
            <i class="bi bi-info-circle me-2"></i>
            Don't see your provider? <a href="{{ route('contact') }}" class="text-primary-blue fw-semibold">Contact us</a> — new plans are added regularly.
        </p>
    </div>
</section>

<!-- What's Covered -->
<section class="section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">What's Typically Covered</h2>
                <p class="text-muted mb-4">Most plans cover medically necessary mental health and behavioral health services. Coverage may include:</p>
                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary-green me-3 mt-1 fs-4"></i>
                        <span>Individual, couples, family, and group therapy sessions</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary-green me-3 mt-1 fs-4"></i>
                        <span>Psychiatric evaluations and medication management</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary-green me-3 mt-1 fs-4"></i>
                        <span>Psychological assessments and testing</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary-green me-3 mt-1 fs-4"></i>
                        <span>Crisis intervention and intensive outpatient programs</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="bi bi-check-circle-fill text-primary-green me-3 mt-1 fs-4"></i>
                        <span>Telehealth and virtual care sessions</span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=900&q=80"
                    alt="Insurance coverage" class="img-cover rounded shadow-lg" style="aspect-ratio: 4 / 3;">
            </div>
        </div>
    </div>
</section>

<!-- Payment Options -->
<section class="section bg-soft-blue">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="section-title">Payment Options</h2>
                <p class="section-subtitle">Multiple ways to pay for the care that's right for you.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-4 text-center">
                    <div class="card-icon-small mx-auto mb-3"><i class="bi bi-credit-card-2-front"></i></div>
                    <h5 class="fw-bold">In-Network Insurance</h5>
                    <p class="text-muted mb-0">Pay only your copay, coinsurance, or deductible at the time of service.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-4 text-center">
                    <div class="card-icon-small mx-auto mb-3"><i class="bi bi-receipt"></i></div>
                    <h5 class="fw-bold">Out-of-Network</h5>
                    <p class="text-muted mb-0">We provide superbills you can submit to your insurance for reimbursement.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-4 text-center">
                    <div class="card-icon-small mx-auto mb-3"><i class="bi bi-cash-coin"></i></div>
                    <h5 class="fw-bold">Self-Pay / Sliding Scale</h5>
                    <p class="text-muted mb-0">Reduced-fee sessions are available based on income and household size.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 p-4 text-center">
                    <div class="card-icon-small mx-auto mb-3"><i class="bi bi-heart-pulse"></i></div>
                    <h5 class="fw-bold">Financial Assistance</h5>
                    <p class="text-muted mb-0">Our financial counselors can help you find programs and resources.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Verify -->
<section class="section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <h2 class="section-title">How to Verify Your Coverage</h2>
                <p class="text-muted mb-4">Before your first appointment, we recommend confirming your benefits. You can:</p>
                <ol class="ps-3">
                    <li class="mb-3">Call the member services number on the back of your insurance card.</li>
                    <li class="mb-3">Ask whether outpatient mental health services are covered, and what your copay, coinsurance, or deductible will be.</li>
                    <li class="mb-3">Confirm whether a referral or pre-authorization is required.</li>
                    <li class="mb-3">Share your plan details with our admissions team — we'll handle the rest.</li>
                </ol>
                <a href="{{ route('contact') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-telephone me-2"></i>Talk to Our Admissions Team
                </a>
            </div>
            <div class="col-lg-6 order-lg-1">
                <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=900&q=80"
                    alt="Verify insurance" class="img-cover rounded shadow-lg" style="aspect-ratio: 4 / 3;">
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section pt-0">
    <div class="container">
        <div class="cta-overlay" style="background-image: url('https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=1920&q=80');">
            <div class="container cta-content text-center py-5">
                <h2 class="text-white mb-3">Have Questions About Your Plan?</h2>
                <p class="lead text-white mb-4">Our team is happy to help you understand your benefits and find the best path to care.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-2">Contact Us</a>
                <a href="{{ route('appointments.create') }}" class="btn btn-outline-light btn-lg">Book Appointment</a>
            </div>
        </div>
    </div>
</section>
@endsection
