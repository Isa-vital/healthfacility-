@extends('layouts.app')

@section('title', 'Frequently Asked Questions - Global Mental Healthcare Association')
@section('description', 'Answers to common questions about appointments, services, insurance, confidentiality, and what to expect at Global Mental Healthcare Association.')

@section('content')
<!-- Hero -->
<section class="hero-section" style="background: linear-gradient(rgba(44,95,141,0.55), rgba(63,170,122,0.45)), url('https://images.unsplash.com/photo-1521791136064-7986c2920216?w=1920&q=80') center/cover; min-height: 50vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-3 text-white">Frequently Asked Questions</h1>
        <p class="lead fs-4 text-white mb-0">Clear answers to help you take the next step with confidence.</p>
    </div>
</section>

<div class="spacer-lg"></div>

<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                @php
                $categories = [
                'Getting Started' => [
                [
                'q' => 'How do I book my first appointment?',
                'a' => 'You can book online through our <a href="' . route('appointments.create') . '">appointment page</a>, call us at 0773 251 311, or email info@globalmentalhealthcare.org. A member of our intake team will confirm your appointment and answer any initial questions.',
                ],
                [
                'q' => 'What happens during the first session?',
                'a' => 'Your first session is an intake assessment. Your clinician will ask about your background, current concerns, and goals to develop a personalized care plan. It usually lasts 50–60 minutes.',
                ],
                [
                'q' => 'Do I need a referral to see a therapist or psychiatrist?',
                'a' => 'No referral is required for most services. However, some insurance plans may require one — we recommend checking with your provider.',
                ],
                ],
                'Services & Treatment' => [
                [
                'q' => 'What types of therapy do you offer?',
                'a' => 'We provide individual, couples, family, and group therapy, as well as psychiatric care, child and adolescent services, and specialty treatment for anxiety, depression, trauma, and more. See our <a href="' . route('services.index') . '">services page</a> for the full list.',
                ],
                [
                'q' => 'Do you offer virtual / telehealth sessions?',
                'a' => 'Yes. Most of our services are available via secure, HIPAA-compliant video sessions, so you can receive care from anywhere with an internet connection.',
                ],
                [
                'q' => 'How long does therapy usually take?',
                'a' => 'Every journey is different. Some clients benefit from short-term, focused work (6–12 sessions), while others choose longer-term therapy. Your clinician will discuss recommendations with you.',
                ],
                ],
                'Insurance & Payment' => [
                [
                'q' => 'Do you accept insurance?',
                'a' => 'Yes — we are in-network with many major providers. Visit our <a href="' . route('insurance') . '">insurance page</a> for a list of accepted plans and payment options.',
                ],
                [
                'q' => 'What if I don\'t have insurance?',
                'a' => 'We offer self-pay rates and a sliding-fee scale for those who qualify. Our financial counselors can help you explore options.',
                ],
                [
                'q' => 'What is your cancellation policy?',
                'a' => 'We ask for at least 24 hours\' notice to cancel or reschedule. Late cancellations or missed appointments may be subject to a fee.',
                ],
                ],
                'Privacy & Confidentiality' => [
                [
                'q' => 'Is what I share confidential?',
                'a' => 'Yes. We follow strict HIPAA and ethical guidelines. Information shared in sessions is private, with limited legal exceptions (e.g., imminent risk of harm) that your clinician will review with you.',
                ],
                [
                'q' => 'Will my employer or family find out I\'m in therapy?',
                'a' => 'No. We do not share information with employers or family members without your written consent, except as required by law.',
                ],
                ],
                'Crisis & Support' => [
                [
                'q' => 'What should I do in a mental health emergency?',
                'a' => 'If you or someone you know is in immediate danger, call your local emergency number or go to the nearest emergency room. You can also reach our crisis line at <a href="tel:0773251311">0773 251 311</a>.',
                ],
                [
                'q' => 'Do you provide services for children and teens?',
                'a' => 'Yes. We offer age-appropriate therapy for children, adolescents, and families. Initial sessions typically include parents or guardians.',
                ],
                ],
                ];
                $i = 0;
                @endphp

                @foreach($categories as $category => $items)
                <h3 class="mt-5 mb-3 fw-bold text-primary-blue">{{ $category }}</h3>
                <div class="accordion accordion-flush" id="faqAccordion-{{ $loop->index }}">
                    @foreach($items as $item)
                    @php $i++; @endphp
                    <div class="accordion-item mb-3" style="border: 1px solid var(--border-color); border-radius: 12px; overflow: hidden;">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faq-{{ $i }}"
                                aria-expanded="false" aria-controls="faq-{{ $i }}"
                                style="font-size: 1.15rem;">
                                {{ $item['q'] }}
                            </button>
                        </h2>
                        <div id="faq-{{ $i }}" class="accordion-collapse collapse"
                            data-bs-parent="#faqAccordion-{{ $loop->parent->index }}">
                            <div class="accordion-body text-muted">
                                {!! $item['a'] !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section pt-0">
    <div class="container">
        <div class="cta-overlay" style="background-image: url('https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=1920&q=80');">
            <div class="container cta-content text-center py-5">
                <h2 class="text-white mb-3">Still Have Questions?</h2>
                <p class="lead text-white mb-4">Our team is here to help. Reach out anytime — we'd love to hear from you.</p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-2">Contact Us</a>
                <a href="{{ route('appointments.create') }}" class="btn btn-outline-light btn-lg">Book Appointment</a>
            </div>
        </div>
    </div>
</section>
@endsection