@extends('layouts.app')

@section('title', 'Contact Us - Safe Haven Wellness Center')
@section('description', 'Get in touch with Safe Haven Wellness Center. We\'re here to answer your questions and help you start your wellness journey.')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background-image: url('https://images.unsplash.com/photo-1516302752625-fcc3c50ae61f?w=1920&q=80'); min-height: 55vh;">
    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-semibold mb-4">Get In Touch</h1>
                <p class="lead" style="font-size: 1.25rem; opacity: 0.95;">We're here to answer your questions and support you every step of the way.</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Contact Section -->
<section class="container">
    <div class="row g-5">
        <!-- Contact Form -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-lg-5">
                    <h2 class="h3 mb-2">Send Us a Message</h2>
                    <p class="text-muted mb-4">Fill out the form below and we'll get back to you within 24 hours.</p>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-medium">Your Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required
                                    placeholder="John Doe">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-medium">Email Address *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="john@example.com">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-medium">Phone Number</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="(555) 123-4567">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label fw-medium">Subject *</label>
                                <select class="form-select @error('subject') is-invalid @enderror" id="subject" name="subject" required>
                                    <option value="">Choose a subject</option>
                                    <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                    <option value="Appointment Question" {{ old('subject') == 'Appointment Question' ? 'selected' : '' }}>Appointment Question</option>
                                    <option value="Insurance Question" {{ old('subject') == 'Insurance Question' ? 'selected' : '' }}>Insurance Question</option>
                                    <option value="Services Information" {{ old('subject') == 'Services Information' ? 'selected' : '' }}>Services Information</option>
                                    <option value="Billing" {{ old('subject') == 'Billing' ? 'selected' : '' }}>Billing</option>
                                    <option value="Other" {{ old('subject') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label fw-medium">Your Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror"
                                    id="message" name="message" rows="6" required
                                    placeholder="Tell us how we can help you...">{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="bi bi-send"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-5">
            <div class="position-sticky" style="top: 2rem;">
                <div class="mb-3">
                    <h2 class="h4 fw-bold mb-2">Contact Information</h2>
                    <p class="text-muted small mb-0">Get in touch with us through any of these channels</p>
                </div>

                <!-- Address -->
                <div class="card mb-2">
                    <div class="card-body p-3">
                        <div class="d-flex gap-2">
                            <div style="width: 40px; height: 40px; min-width: 40px; background: var(--soft-blue);" class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="bi bi-geo-alt-fill" style="color: var(--primary-blue); font-size: 1.1rem;"></i>
                            </div>
                            <div style="overflow: hidden;">
                                <h6 class="mb-1 fw-bold" style="font-size: 0.9rem;">Our Location</h6>
                                <p class="text-muted mb-0" style="font-size: 0.85rem; line-height: 1.4;">
                                    Safe Haven Wellness Center<br>
                                    Wellness Avenue, Kampala, Uganda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="card mb-2">
                    <div class="card-body p-3">
                        <div class="d-flex gap-2">
                            <div style="width: 40px; height: 40px; min-width: 40px; background: var(--soft-green);" class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="bi bi-telephone-fill" style="color: var(--primary-green); font-size: 1.1rem;"></i>
                            </div>
                            <div style="overflow: hidden;">
                                <h6 class="mb-1 fw-bold" style="font-size: 0.9rem;">Phone</h6>
                                <div style="font-size: 0.85rem;">
                                    <p class="mb-1"><a href="tel:555-123-4567" class="text-decoration-none">(555) 123-4567</a></p>
                                    <p class="mb-0"><strong>Crisis (24/7):</strong> <a href="tel:988" class="text-decoration-none fw-bold" style="color: var(--primary-green);">988</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="card mb-2">
                    <div class="card-body p-3">
                        <div class="d-flex gap-2">
                            <div style="width: 40px; height: 40px; min-width: 40px; background: #FFF3E0;" class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="bi bi-envelope-fill" style="color: #F57C00; font-size: 1.1rem;"></i>
                            </div>
                            <div style="overflow: hidden;">
                                <h6 class="mb-1 fw-bold" style="font-size: 0.9rem;">Email</h6>
                                <div style="font-size: 0.85rem;">
                                    <p class="mb-1"><a href="mailto:info@safehavenwellness.com" class="text-decoration-none" style="word-break: break-all;">info@safehavenwellness.com</a></p>
                                    <p class="mb-0"><a href="mailto:appointments@safehavenwellness.com" class="text-decoration-none" style="word-break: break-all;">appointments@safehavenwellness.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hours -->
                <div class="card">
                    <div class="card-body p-3">
                        <div class="d-flex gap-2">
                            <div style="width: 40px; height: 40px; min-width: 40px; background: #E8F5E9;" class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0">
                                <i class="bi bi-clock-fill" style="color: #2E7D32; font-size: 1.1rem;"></i>
                            </div>
                            <div style="overflow: hidden;">
                                <h6 class="mb-2 fw-bold" style="font-size: 0.9rem;">Office Hours</h6>
                                <div style="font-size: 0.82rem; line-height: 1.6;">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-medium">Mon - Fri:</span>
                                        <span class="text-muted">8 AM - 8 PM</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-medium">Saturday:</span>
                                        <span class="text-muted">9 AM - 5 PM</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-medium">Sunday:</span>
                                        <span class="text-muted">Closed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- FAQ Section -->
<section class="container">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-semibold mb-3">Frequently Asked Questions</h2>
        <p class="text-muted">Quick answers to common questions about our services</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item border-0 mb-3 shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            <i class="bi bi-question-circle me-2" style="color: var(--primary-blue);"></i>
                            Do you accept my insurance?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            We accept most major insurance plans including Blue Cross Blue Shield, Aetna, United Healthcare, Cigna, Medicare, and Medicaid. Please contact us to verify your specific coverage before your first appointment.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-3 shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            <i class="bi bi-question-circle me-2" style="color: var(--primary-blue);"></i>
                            How quickly can I schedule an appointment?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Most new patients can be seen within 1-2 weeks. We also offer same-day appointments for urgent situations. Crisis support is available 24/7 by calling 988.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-3 shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            <i class="bi bi-question-circle me-2" style="color: var(--primary-blue);"></i>
                            Do you offer telehealth appointments?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Yes! We offer secure video sessions for most therapy and counseling services. Virtual appointments are available during our regular business hours and can be scheduled through our online booking system.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-3 shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                            <i class="bi bi-question-circle me-2" style="color: var(--primary-blue);"></i>
                            What should I bring to my first appointment?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Please bring a valid photo ID, your insurance card (if applicable), a list of current medications, and any relevant medical records. Arriving 10-15 minutes early will allow time to complete necessary paperwork.
                        </div>
                    </div>
                </div>

                <div class="accordion-item border-0 mb-3 shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                            <i class="bi bi-question-circle me-2" style="color: var(--primary-blue);"></i>
                            Is my information confidential?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Absolutely. We are bound by HIPAA regulations and maintain strict confidentiality. Information is only shared with your explicit consent or when required by law (such as imminent danger situations).
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Map Section -->
<section class="container">
    <h2 class="display-6 fw-semibold text-center mb-5">Find Us</h2>
    <div class="card border-0 shadow-sm overflow-hidden">
        <div class="aspect-16-9" style="background: linear-gradient(135deg, rgba(107,155,209,0.1), rgba(136,181,160,0.1)), 
                    url('https://images.unsplash.com/photo-1524661135-423995f22d0b?w=1920&q=80') center/cover;">
            <div class="h-100 d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.9);">
                <div class="text-center p-5">
                    <span class="card-icon-small d-inline-flex mb-3" style="width: 80px; height: 80px; font-size: 2rem; background: var(--soft-blue);">
                        <i class="bi bi-geo-alt-fill" style="color: var(--primary-blue);"></i>
                    </span>
                    <h3 class="mb-3">Visit Our Center</h3>
                    <p class="text-muted mb-4" style="max-width: 400px;">
                        Safe Haven Wellness Center<br>
                        Wellness Avenue<br>
                        Kampala, Uganda
                    </p>
                    <a href="https://www.google.com/maps" target="_blank" class="btn btn-primary btn-lg">
                        <i class="bi bi-geo-alt"></i> Get Directions
                    </a>
                    <p class="small text-muted mt-3 mb-0">
                        <i class="bi bi-p-circle"></i> Free parking available | <i class="bi bi-universal-access"></i> Wheelchair accessible
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Insurance Section -->
<section class="container">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-semibold mb-3">Insurance & Payment</h2>
        <p class="text-muted">We accept most major insurance plans and offer flexible payment options</p>
    </div>

    <div class="row g-3">
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-shield-check" style="font-size: 2.5rem; color: var(--primary-blue);"></i>
                <h6 class="mt-3 mb-0">Blue Cross Blue Shield</h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-shield-check" style="font-size: 2.5rem; color: var(--primary-blue);"></i>
                <h6 class="mt-3 mb-0">Aetna</h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-shield-check" style="font-size: 2.5rem; color: var(--primary-blue);"></i>
                <h6 class="mt-3 mb-0">United Healthcare</h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-shield-check" style="font-size: 2.5rem; color: var(--primary-blue);"></i>
                <h6 class="mt-3 mb-0">Cigna</h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-heart-pulse" style="font-size: 2.5rem; color: var(--primary-green);"></i>
                <h6 class="mt-3 mb-0">Medicare</h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-heart-pulse" style="font-size: 2.5rem; color: var(--primary-green);"></i>
                <h6 class="mt-3 mb-0">Medicaid</h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-shield-check" style="font-size: 2.5rem; color: var(--primary-blue);"></i>
                <h6 class="mt-3 mb-0">Humana</h6>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card h-100 border-0 shadow-sm text-center p-4">
                <i class="bi bi-wallet2" style="font-size: 2.5rem; color: #F57C00;"></i>
                <h6 class="mt-3 mb-0">Self-Pay Options</h6>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <div class="card border-0 shadow-sm d-inline-block">
            <div class="card-body p-4">
                <i class="bi bi-info-circle" style="color: var(--primary-blue); font-size: 1.5rem;"></i>
                <p class="mb-0 mt-2">Don't see your insurance provider? <a href="mailto:info@safehavenwellness.com">Contact us</a> to verify your coverage.</p>
            </div>
        </div>
    </div>
</section>

<div class="spacer-lg"></div>
@endsection