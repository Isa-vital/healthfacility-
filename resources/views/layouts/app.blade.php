<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Safe Haven Wellness Center - Mental Health Care')</title>
    <meta name="description" content="@yield('description', 'Professional mental health services and compassionate care in a safe, welcoming environment.')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0F7B8A;
            --light-blue: #4FA8B5;
            --soft-blue: #E6F4F5;
            --primary-green: #66B58C;
            --light-green: #8FC9A9;
            --soft-green: #E8F5EE;
            --white: #FFFFFF;
            --off-white: #FAFBFC;
            --light-gray: #F8F9FA;
            --text-dark: #1A202C;
            --text-muted: #718096;
            --border-color: #E2E8F0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--text-dark);
            line-height: 1.65;
            font-weight: 400;
            background: var(--white);
            font-size: 16px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 600;
            line-height: 1.25;
            color: var(--text-dark);
            letter-spacing: -0.01em;
        }

        /* Navigation */
        .navbar {
            background: var(--white);
            padding: 1rem 0;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark) !important;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: -0.01em;
        }

        .navbar-brand i {
            font-size: 1.5rem;
            color: var(--primary-green);
        }

        .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.2s ease;
            position: relative;
            font-size: 0.9375rem;
            padding: 0.5rem 0.75rem !important;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
        }

        .btn-appointment {
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.2s ease;
            font-size: 0.9375rem;
        }

        .btn-appointment:hover {
            background: #0d6876;
            color: var(--white);
        }

        /* Emergency Banner */
        .emergency-banner {
            background: linear-gradient(90deg, #E57373 0%, #EF5350 100%);
            color: var(--white);
            padding: 0.85rem 0;
            text-align: center;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .emergency-banner a {
            color: var(--white);
            text-decoration: none;
            margin-left: 1rem;
            font-weight: 600;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            transition: border-color 0.3s;
        }

        .emergency-banner a:hover {
            border-bottom-color: var(--white);
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            min-height: 90vh;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: var(--white);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(107, 155, 209, 0.85) 0%, rgba(136, 181, 160, 0.75) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        /* Cards */
        .card {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: none;
            transition: all 0.2s ease;
            height: 100%;
            background: var(--white);
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-color: #CBD5E0;
        }

        .card-img-top {
            transition: transform 0.4s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.02);
        }

        .card-icon-small {
            width: 56px;
            height: 56px;
            background: var(--soft-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-blue);
            flex-shrink: 0;
        }

        /* Buttons */
        .btn {
            border-radius: 6px;
            font-weight: 600;
            padding: 0.65rem 1.5rem;
            transition: all 0.2s ease;
            font-size: 0.9375rem;
            border: none;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #0d6876;
            color: var(--white);
        }

        .btn-success {
            background: var(--primary-green);
            color: var(--white);
        }

        .btn-success:hover {
            background: #5aa57a;
            color: var(--white);
        }

        .btn-light {
            background: var(--white);
            color: var(--text-dark);
            border: 1px solid var(--border-color);
        }

        .btn-light:hover {
            background: var(--light-gray);
            color: var(--text-dark);
        }

        .btn-outline-light {
            border: 2px solid var(--white);
            color: var(--white);
            background: transparent;
        }

        .btn-outline-light:hover {
            background: var(--white);
            color: var(--primary-blue);
        }

        /* Sections */
        .section {
            padding: 100px 0;
        }

        .section-sm {
            padding: 60px 0;
        }

        .section-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.125rem;
            margin-bottom: 3rem;
            font-weight: 400;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        /* Footer */
        footer {
            background: #1A202C;
            color: rgba(255, 255, 255, 0.8);
            padding: 4rem 0 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        footer h5 {
            color: var(--white);
            margin-bottom: 1.25rem;
            font-weight: 700;
            font-size: 0.9375rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.2s;
            font-size: 0.9375rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        footer a:hover {
            color: var(--white);
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            margin: 0 0.25rem;
            transition: all 0.2s;
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.15);
            color: var(--white);
        }

        /* Testimonials */
        .testimonial-card {
            background: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 2rem;
            box-shadow: none;
            transition: all 0.2s ease;
        }

        .testimonial-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-color: #CBD5E0;
        }

        .testimonial-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1.5rem;
            border: 3px solid var(--soft-green);
        }

        .testimonial-stars {
            color: #FFA726;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .testimonial-content {
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--text-dark);
            font-style: italic;
        }

        /* Staff Cards */
        .staff-card img {
            width: 100%;
            height: 340px;
            object-fit: cover;
        }

        /* Forms */
        .form-control,
        .form-select {
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            font-size: 0.9375rem;
            transition: border-color 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(15, 123, 138, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        /* Badge */
        .badge-custom {
            background: var(--soft-blue);
            color: var(--primary-blue);
            padding: 0.4rem 0.9rem;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.8125rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        /* Alert */
        .alert-success {
            background: var(--soft-green);
            border: 1px solid var(--light-green);
            color: var(--text-dark);
            border-radius: 12px;
        }

        /* Image overlay sections */
        .cta-overlay {
            position: relative;
            background-size: cover;
            background-position: center;
            min-height: 400px;
            display: flex;
            align-items: center;
            border-radius: 24px;
            overflow: hidden;
            margin: 0 15px;
        }

        .cta-overlay::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(107, 155, 209, 0.92) 0%, rgba(136, 181, 160, 0.88) 100%);
        }

        .cta-content {
            position: relative;
            z-index: 2;
            color: var(--white);
        }

        /* Spacing utilities */
        .spacer-xs {
            height: 2rem;
        }

        .spacer-sm {
            height: 3rem;
        }

        .spacer-md {
            height: 4rem;
        }

        .spacer-lg {
            height: 5rem;
        }

        .spacer-xl {
            height: 6rem;
        }

        /* Color utilities */
        .text-primary-blue {
            color: var(--primary-blue);
        }

        .text-primary-green {
            color: var(--primary-green);
        }

        .bg-soft-blue {
            background: var(--soft-blue);
        }

        .bg-soft-green {
            background: var(--soft-green);
        }

        .bg-light-gray {
            background: var(--light-gray);
        }

        /* Image aspect ratio */
        .img-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .aspect-16-9 {
            aspect-ratio: 16 / 9;
        }

        .aspect-4-3 {
            aspect-ratio: 4 / 3;
        }

        .aspect-1-1 {
            aspect-ratio: 1 / 1;
        }
    </style>
    @yield('styles')
</head>

<body>
    <!-- Emergency Banner -->
    <div class="emergency-banner">
        <div class="container">
            <i class="bi bi-exclamation-triangle-fill"></i> Crisis Support Available 24/7
            <a href="tel:988">Call 988</a>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-heart-pulse-fill"></i>
                Safe Haven Wellness
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('staff.index') }}">Our Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">Resources</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-appointment" href="{{ route('appointments.create') }}">
                            Book Appointment
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer style="background: linear-gradient(180deg, #1a2332 0%, #0d1520 100%); color: white; padding: 4rem 0 2rem;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-heart-pulse-fill me-2" style="font-size: 1.75rem; color: var(--primary-green);"></i>
                        <h4 class="mb-0 fw-bold text-white">Safe Haven Wellness</h4>
                    </div>
                    <p style="opacity: 0.85; line-height: 1.7; margin-bottom: 1.5rem;">Compassionate mental health care in a safe, welcoming environment. Your journey to wellness starts here.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);" aria-label="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.2);" aria-label="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('about') }}" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">About Us</a></li>
                        <li class="mb-2"><a href="{{ route('services.index') }}" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">Services</a></li>
                        <li class="mb-2"><a href="{{ route('staff.index') }}" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">Our Team</a></li>
                        <li class="mb-2"><a href="{{ route('blog.index') }}" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">Resources</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Get Help</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('appointments.create') }}" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">Book Appointment</a></li>
                        <li class="mb-2"><a href="tel:988" style="color: var(--primary-green); text-decoration: none; font-weight: 600;">Crisis Hotline: 988</a></li>
                        <li class="mb-2"><a href="#" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">Insurance Information</a></li>
                        <li class="mb-2"><a href="#" style="color: rgba(255,255,255,0.75); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h6 class="fw-bold mb-3 text-white">Contact Info</h6>
                    <ul class="list-unstyled" style="color: rgba(255,255,255,0.75);">
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-geo-alt-fill me-2 mt-1" style="color: var(--primary-green);"></i>
                            <span>123 Wellness Avenue<br>Kampala, Uganda</span>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-telephone-fill me-2" style="color: var(--primary-green);"></i>
                            <a href="tel:5551234567" style="color: rgba(255,255,255,0.75); text-decoration: none;">(555) 123-4567</a>
                        </li>
                        <li class="mb-2 d-flex align-items-center">
                            <i class="bi bi-envelope-fill me-2" style="color: var(--primary-green);"></i>
                            <a href="mailto:hello@safehaven.com" style="color: rgba(255,255,255,0.75); text-decoration: none;">hello@safehaven.com</a>
                        </li>
                        <li class="mb-2 d-flex align-items-start">
                            <i class="bi bi-clock-fill me-2 mt-1" style="color: var(--primary-green);"></i>
                            <span>Mon-Fri: 8AM-8PM<br>Sat: 9AM-5PM</span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.15); margin: 2.5rem 0 1.5rem;">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0" style="color: rgba(255,255,255,0.6); font-size: 0.9rem;">&copy; {{ date('Y') }} Safe Haven Wellness Center. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" style="color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.9rem; margin: 0 0.75rem;">Privacy Policy</a>
                    <a href="#" style="color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.9rem; margin: 0 0.75rem;">Terms of Service</a>
                    <a href="#" style="color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.9rem; margin: 0 0.75rem;">Accessibility</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>