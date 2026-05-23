@extends('layouts.app')

@section('title', 'Terms of Service - Global Mental Healthcare Association')
@section('description', 'The terms and conditions governing your use of Global Mental Healthcare Association services and website.')

@section('content')
<section class="hero-section" style="background: linear-gradient(rgba(44,95,141,0.55), rgba(63,170,122,0.45)), url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1920&q=80') center/cover; min-height: 40vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-2 text-white">Terms of Service</h1>
        <p class="lead text-white mb-0">Last updated: {{ date('F j, Y') }}</p>
    </div>
</section>

<div class="spacer-lg"></div>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <p class="text-muted">
                    These Terms of Service ("Terms") govern your access to and use of the Global Mental Healthcare
                    Association website and services. By using our website or scheduling services with us, you agree
                    to these Terms.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">1. Use of Services</h3>
                <p class="text-muted">
                    Our services are intended for individuals seeking mental health support and information. You agree
                    to provide accurate information and use the website lawfully and respectfully.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">2. Not a Substitute for Emergency Care</h3>
                <p class="text-muted">
                    This website does not provide emergency services. If you are experiencing a mental health crisis or
                    medical emergency, call your local emergency number, go to the nearest emergency room, or contact
                    our crisis line at <a href="tel:0773251311">0773 251 311</a>.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">3. Appointments & Cancellations</h3>
                <p class="text-muted">
                    Appointment requests are confirmed by our intake team. We require at least 24 hours' notice for
                    cancellations or rescheduling; late cancellations or no-shows may incur a fee.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">4. Payment & Insurance</h3>
                <p class="text-muted">
                    You are responsible for any fees not covered by insurance. By providing payment information, you
                    authorize us to charge applicable copays, coinsurance, deductibles, or self-pay amounts. See our
                    <a href="{{ route('insurance') }}">insurance page</a> for more information.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">5. Confidentiality</h3>
                <p class="text-muted">
                    Information you share during care is held in confidence as described in our
                    <a href="{{ route('privacy') }}">Privacy Policy</a> and applicable law.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">6. Intellectual Property</h3>
                <p class="text-muted">
                    All content on this website — including text, graphics, logos, and images — is the property of
                    Global Mental Healthcare Association or its licensors and is protected by applicable laws. You
                    may not reproduce or distribute content without written permission.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">7. Third-Party Links</h3>
                <p class="text-muted">
                    Our website may include links to third-party sites for informational purposes. We are not
                    responsible for the content, accuracy, or practices of those sites.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">8. Limitation of Liability</h3>
                <p class="text-muted">
                    To the maximum extent permitted by law, Global Mental Healthcare Association is not liable for
                    any indirect, incidental, or consequential damages arising from your use of this website.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">9. Changes to These Terms</h3>
                <p class="text-muted">
                    We may update these Terms periodically. Continued use of our services or website after changes
                    constitutes acceptance of the revised Terms.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">10. Contact</h3>
                <p class="text-muted">
                    Questions? Email <a href="mailto:info@globalmentalhealthcare.org">info@globalmentalhealthcare.org</a>
                    or call <a href="tel:0773251311">0773 251 311</a>.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection