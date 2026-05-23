@extends('layouts.app')

@section('title', 'Privacy Policy - Global Mental Healthcare Association')
@section('description', 'How Global Mental Healthcare Association collects, uses, and protects your personal and health information.')

@section('content')
<section class="hero-section" style="background: linear-gradient(rgba(44,95,141,0.55), rgba(63,170,122,0.45)), url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1920&q=80') center/cover; min-height: 40vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-2 text-white">Privacy Policy</h1>
        <p class="lead text-white mb-0">Last updated: {{ date('F j, Y') }}</p>
    </div>
</section>

<div class="spacer-lg"></div>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <p class="text-muted">
                    Global Mental Healthcare Association ("we," "us," or "our") is committed to protecting the privacy
                    and confidentiality of every individual we serve. This Privacy Policy describes how we collect,
                    use, share, and safeguard your information when you use our website, services, or facilities.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">1. Information We Collect</h3>
                <p class="text-muted">We may collect the following information:</p>
                <ul class="text-muted">
                    <li>Personal identifiers such as name, email, phone number, and date of birth.</li>
                    <li>Health-related information you provide for assessment, treatment, or billing.</li>
                    <li>Insurance and payment details necessary to process services.</li>
                    <li>Website usage data such as IP address, browser type, and pages visited.</li>
                </ul>

                <h3 class="mt-5 mb-3 fw-bold">2. How We Use Your Information</h3>
                <ul class="text-muted">
                    <li>To provide, coordinate, and improve our clinical and support services.</li>
                    <li>To schedule, confirm, and follow up on appointments.</li>
                    <li>To process insurance claims and payments.</li>
                    <li>To comply with legal, regulatory, and accreditation requirements.</li>
                    <li>To communicate updates, resources, and educational materials (you may opt out at any time).</li>
                </ul>

                <h3 class="mt-5 mb-3 fw-bold">3. How We Protect Your Information</h3>
                <p class="text-muted">
                    We use industry-standard administrative, technical, and physical safeguards to protect your
                    information, including encrypted communication, role-based access controls, and secure storage
                    of clinical records.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">4. Sharing of Information</h3>
                <p class="text-muted">
                    We do not sell your personal information. We may share information only:
                </p>
                <ul class="text-muted">
                    <li>With your written consent.</li>
                    <li>With trusted providers who help us deliver care (under confidentiality agreements).</li>
                    <li>When required by law, court order, or to prevent imminent harm.</li>
                </ul>

                <h3 class="mt-5 mb-3 fw-bold">5. Your Rights</h3>
                <p class="text-muted">
                    You have the right to access, correct, or request deletion of your personal information, subject
                    to applicable legal and clinical record-keeping requirements. To exercise these rights, please
                    <a href="{{ route('contact') }}">contact us</a>.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">6. Cookies & Analytics</h3>
                <p class="text-muted">
                    Our website may use cookies and similar technologies to improve your experience and understand
                    how the site is used. You can control cookies through your browser settings.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">7. Updates to This Policy</h3>
                <p class="text-muted">
                    We may update this Privacy Policy from time to time. Changes will be posted on this page with a
                    revised "Last updated" date.
                </p>

                <h3 class="mt-5 mb-3 fw-bold">8. Contact Us</h3>
                <p class="text-muted">
                    Questions about this policy? Email
                    <a href="mailto:info@globalmentalhealthcare.org">info@globalmentalhealthcare.org</a>
                    or call <a href="tel:0773251311">0773 251 311</a>.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
