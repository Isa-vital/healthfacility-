<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@safehavenwellness.com',
        ]);

        // Create Services
        $services = [
            [
                'title' => 'Individual Therapy',
                'slug' => 'individual-therapy',
                'description' => 'One-on-one sessions with experienced therapists tailored to your specific needs and goals.',
                'full_description' => "Our individual therapy sessions provide a safe, confidential space where you can work through personal challenges with a licensed therapist. We use evidence-based approaches including Cognitive Behavioral Therapy (CBT), Dialectical Behavior Therapy (DBT), and mindfulness techniques.\n\nWhether you're dealing with anxiety, depression, trauma, relationship issues, or life transitions, our therapists are here to support you. Sessions are typically 50 minutes and can be scheduled weekly or bi-weekly based on your needs.",
                'icon' => 'chat-heart',
                'category' => 'therapy',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Group Therapy',
                'slug' => 'group-therapy',
                'description' => 'Connect with others facing similar challenges in supportive, therapist-led group settings.',
                'full_description' => "Group therapy offers a unique opportunity to heal and grow alongside others who understand your struggles. Our facilitated groups provide support, accountability, and diverse perspectives.\n\nWe offer groups focused on anxiety management, depression support, trauma recovery, substance abuse recovery, and more. Groups typically meet weekly and are led by licensed therapists.",
                'icon' => 'people-fill',
                'category' => 'therapy',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Family Counseling',
                'slug' => 'family-counseling',
                'description' => 'Strengthen family relationships and improve communication with expert family therapy.',
                'full_description' => "Family therapy helps families understand and address complex dynamics, improve communication, and develop healthier patterns of interaction. We work with families of all structures and sizes.\n\nOur family therapists are trained in systemic approaches and can help with parenting challenges, teen issues, conflict resolution, divorce/separation, and blended family adjustment.",
                'icon' => 'house-heart',
                'category' => 'therapy',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'title' => 'Couples Therapy',
                'slug' => 'couples-therapy',
                'description' => 'Rebuild connection, improve communication, and strengthen your relationship.',
                'full_description' => "Our couples therapy helps partners navigate relationship challenges, improve communication, and rebuild emotional intimacy. Whether you're facing specific issues or want to strengthen your bond, we can help.\n\nWe address concerns like communication problems, infidelity, parenting disagreements, intimacy issues, and pre-marital preparation.",
                'icon' => 'heart-fill',
                'category' => 'therapy',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'title' => 'Anxiety Treatment',
                'slug' => 'anxiety-treatment',
                'description' => 'Evidence-based treatment for generalized anxiety, panic disorder, phobias, and OCD.',
                'full_description' => "Anxiety can be overwhelming, but it's highly treatable. Our anxiety specialists use proven techniques including Cognitive Behavioral Therapy (CBT), Exposure Response Prevention (ERP), and mindfulness approaches.\n\nWe treat generalized anxiety disorder, panic disorder, social anxiety, specific phobias, and obsessive-compulsive disorder (OCD). Treatment is personalized to your specific symptoms and needs.",
                'icon' => 'shield-exclamation',
                'category' => 'specialty',
                'is_featured' => true,
                'order' => 5,
            ],
            [
                'title' => 'Depression Treatment',
                'slug' => 'depression-treatment',
                'description' => 'Comprehensive care for depression using evidence-based therapeutic approaches.',
                'full_description' => "Depression affects millions, but recovery is possible. We offer compassionate, evidence-based treatment including therapy, lifestyle interventions, and medication management when appropriate.\n\nOur approach combines cognitive behavioral therapy, interpersonal therapy, and behavioral activation to help you reclaim your life from depression.",
                'icon' => 'cloud-drizzle',
                'category' => 'specialty',
                'is_featured' => true,
                'order' => 6,
            ],
            [
                'title' => 'Trauma & PTSD Treatment',
                'slug' => 'trauma-ptsd-treatment',
                'description' => 'Specialized care for trauma survivors using trauma-informed approaches.',
                'full_description' => "Healing from trauma is possible. Our trauma specialists are trained in evidence-based treatments including EMDR (Eye Movement Desensitization and Reprocessing), trauma-focused CBT, and somatic therapies.\n\nWe work with survivors of all types of trauma including childhood trauma, assault, accidents, combat trauma, and complex PTSD.",
                'icon' => 'heart-pulse',
                'category' => 'specialty',
                'is_featured' => false,
                'order' => 7,
            ],
            [
                'title' => 'Substance Abuse Counseling',
                'slug' => 'substance-abuse-counseling',
                'description' => 'Support for recovery from substance use disorders and addictive behaviors.',
                'full_description' => "Recovery is a journey, and we're here to support you every step of the way. Our addiction specialists provide individual and group counseling, relapse prevention, and family support.\n\nWe treat alcohol use disorder, drug addiction, behavioral addictions, and co-occurring mental health disorders.",
                'icon' => 'droplet-half',
                'category' => 'treatment',
                'is_featured' => false,
                'order' => 8,
            ],
            [
                'title' => 'Psychiatric Services',
                'slug' => 'psychiatric-services',
                'description' => 'Medication management and psychiatric evaluation by board-certified psychiatrists.',
                'full_description' => "Our psychiatrists provide comprehensive psychiatric evaluation, diagnosis, and medication management. We take an integrated approach, working closely with your therapist for coordinated care.\n\nServices include psychiatric evaluation, medication management, treatment monitoring, and medication education.",
                'icon' => 'capsule',
                'category' => 'treatment',
                'is_featured' => false,
                'order' => 9,
            ],
            [
                'title' => 'Telehealth Services',
                'slug' => 'telehealth-services',
                'description' => 'Access quality mental health care from the comfort of your home via secure video.',
                'full_description' => "Our telehealth platform provides convenient access to therapy and psychiatric services from anywhere. Sessions are conducted via secure, HIPAA-compliant video conferencing.\n\nTelehealth is available for individual therapy, couples therapy, family therapy, psychiatric consultations, and medication management.",
                'icon' => 'camera-video',
                'category' => 'therapy',
                'is_featured' => false,
                'order' => 10,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Create Staff
        $staff = [
            [
                'name' => 'Dr. Sarah Johnson',
                'slug' => 'dr-sarah-johnson',
                'title' => 'Licensed Clinical Psychologist',
                'specialization' => 'Anxiety & Depression',
                'bio' => "Dr. Sarah Johnson is a licensed clinical psychologist with over 15 years of experience treating anxiety and depression. She specializes in Cognitive Behavioral Therapy (CBT) and has helped hundreds of clients overcome their challenges.\n\nDr. Johnson earned her Ph.D. in Clinical Psychology from Stanford University and completed her postdoctoral fellowship at McLean Hospital. She is passionate about providing evidence-based care in a warm, supportive environment.",
                'credentials' => ['Ph.D. in Clinical Psychology', 'Licensed Psychologist', 'CBT Certified'],
                'expertise' => ['Anxiety Disorders', 'Depression', 'Stress Management', 'Cognitive Behavioral Therapy'],
                'languages' => ['English', 'Spanish'],
                'accepting_patients' => true,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'name' => 'Michael Chen, LMFT',
                'slug' => 'michael-chen',
                'title' => 'Licensed Marriage & Family Therapist',
                'specialization' => 'Couples & Family Therapy',
                'bio' => "Michael Chen is a Licensed Marriage and Family Therapist specializing in couples and family dynamics. With a systemic approach, he helps families and couples improve communication and resolve conflicts.\n\nMichael has over 10 years of experience working with diverse families and couples. He is trained in Emotionally Focused Therapy (EFT) and the Gottman Method.",
                'credentials' => ['LMFT', 'EFT Trained', 'Gottman Method Level 2'],
                'expertise' => ['Couples Therapy', 'Family Counseling', 'Communication Skills', 'Conflict Resolution'],
                'languages' => ['English', 'Mandarin'],
                'accepting_patients' => true,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'name' => 'Dr. Emily Rodriguez',
                'slug' => 'dr-emily-rodriguez',
                'title' => 'Board-Certified Psychiatrist',
                'specialization' => 'Medication Management',
                'bio' => "Dr. Emily Rodriguez is a board-certified psychiatrist with expertise in psychopharmacology and integrated mental health care. She takes a holistic approach to medication management, considering biological, psychological, and social factors.\n\nDr. Rodriguez completed her psychiatry residency at Johns Hopkins Hospital and has over 12 years of clinical experience.",
                'credentials' => ['M.D.', 'Board Certified Psychiatrist', 'American Psychiatric Association Member'],
                'expertise' => ['Medication Management', 'Psychiatric Evaluation', 'Depression', 'Bipolar Disorder'],
                'languages' => ['English', 'Spanish'],
                'accepting_patients' => true,
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'name' => 'Jessica Thompson, LCSW',
                'slug' => 'jessica-thompson',
                'title' => 'Licensed Clinical Social Worker',
                'specialization' => 'Trauma & PTSD',
                'bio' => "Jessica Thompson is a Licensed Clinical Social Worker specializing in trauma recovery and PTSD treatment. She is trained in EMDR and trauma-focused CBT, providing compassionate, evidence-based care for trauma survivors.\n\nJessica has worked in trauma treatment for over 8 years, including work with veterans, assault survivors, and individuals with complex trauma histories.",
                'credentials' => ['LCSW', 'EMDR Certified', 'Trauma-Focused CBT Trained'],
                'expertise' => ['Trauma Recovery', 'PTSD', 'EMDR', 'Complex Trauma'],
                'languages' => ['English'],
                'accepting_patients' => true,
                'is_featured' => true,
                'order' => 4,
            ],
        ];

        foreach ($staff as $member) {
            Staff::create($member);
        }

        // Create Testimonials
        $testimonials = [
            [
                'patient_name' => 'Anonymous',
                'patient_initial' => 'S.M.',
                'content' => 'Safe Haven has changed my life. After struggling with anxiety for years, I finally found a place where I felt understood and supported. My therapist is amazing and has given me tools I use every day.',
                'rating' => 5,
                'treatment_type' => 'Individual Therapy',
                'is_approved' => true,
                'is_featured' => true,
            ],
            [
                'patient_name' => 'Anonymous',
                'patient_initial' => 'J.D.',
                'content' => 'The couples therapy saved our marriage. We learned how to communicate better and understand each other. We are so grateful for the care and guidance we received.',
                'rating' => 5,
                'treatment_type' => 'Couples Therapy',
                'is_approved' => true,
                'is_featured' => true,
            ],
            [
                'patient_name' => 'Anonymous',
                'patient_initial' => 'L.R.',
                'content' => 'Professional, compassionate, and effective. The staff at Safe Haven truly cares about their patients. I highly recommend their services to anyone seeking mental health support.',
                'rating' => 5,
                'treatment_type' => 'Depression Treatment',
                'is_approved' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        // Create Blog Posts
        $posts = [
            [
                'title' => '10 Signs You Might Benefit from Therapy',
                'slug' => '10-signs-you-might-benefit-from-therapy',
                'excerpt' => 'Therapy isn\'t just for crisis moments. Here are 10 signs that talking to a professional could help you.',
                'content' => "Many people think therapy is only for severe mental health crises, but that's far from true. Therapy can be beneficial for anyone looking to improve their mental health, cope with stress, or navigate life transitions.\n\nHere are 10 signs you might benefit from therapy:\n\n1. You're feeling overwhelmed by stress\n2. Your emotions feel out of control\n3. You're struggling with relationships\n4. You've experienced trauma\n5. You're going through a major life change\n6. You're using substances to cope\n7. Your sleep or appetite has changed significantly\n8. You're having trouble concentrating\n9. You're feeling disconnected from activities you used to enjoy\n10. You just want to understand yourself better\n\nRemember, seeking help is a sign of strength, not weakness. If any of these signs resonate with you, consider reaching out to a mental health professional.",
                'category' => 'mental-health',
                'tags' => ['therapy', 'mental health', 'self-care'],
                'author_id' => $admin->id,
                'views' => 245,
                'is_published' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Understanding Anxiety: More Than Just Worry',
                'slug' => 'understanding-anxiety',
                'excerpt' => 'Anxiety is one of the most common mental health conditions. Learn about the different types and how to manage them.',
                'content' => "Anxiety disorders affect millions of people worldwide, yet they're often misunderstood. Anxiety is more than just feeling worried or stressed.\n\nTypes of Anxiety Disorders:\n- Generalized Anxiety Disorder (GAD)\n- Panic Disorder\n- Social Anxiety Disorder\n- Specific Phobias\n- Obsessive-Compulsive Disorder (OCD)\n\nCommon symptoms include excessive worry, restlessness, fatigue, difficulty concentrating, irritability, muscle tension, and sleep disturbances.\n\nThe good news is that anxiety disorders are highly treatable. Cognitive Behavioral Therapy (CBT) has been shown to be particularly effective, along with other evidence-based approaches.\n\nIf you're struggling with anxiety, you're not alone, and help is available.",
                'category' => 'mental-health',
                'tags' => ['anxiety', 'mental health', 'treatment'],
                'author_id' => $admin->id,
                'views' => 389,
                'is_published' => true,
                'published_at' => now()->subDays(14),
            ],
            [
                'title' => '5 Daily Habits for Better Mental Health',
                'slug' => '5-daily-habits-for-better-mental-health',
                'excerpt' => 'Small daily habits can make a big difference in your mental wellbeing. Here are 5 practices to incorporate into your routine.',
                'content' => "Taking care of your mental health doesn't always require major life changes. Sometimes, small daily habits can have a significant impact.\n\n1. Practice Mindfulness: Even 5 minutes of mindful breathing can reduce stress and improve focus.\n\n2. Move Your Body: Physical activity releases endorphins and can significantly improve mood.\n\n3. Connect with Others: Social connections are vital for mental health. Reach out to a friend or family member daily.\n\n4. Get Quality Sleep: Prioritize 7-9 hours of sleep. Good sleep hygiene is essential for mental health.\n\n5. Practice Gratitude: Take a moment each day to acknowledge something you're grateful for.\n\nRemember, consistency is key. Start with one habit and build from there.",
                'category' => 'wellness',
                'tags' => ['wellness', 'self-care', 'mental health', 'habits'],
                'author_id' => $admin->id,
                'views' => 521,
                'is_published' => true,
                'published_at' => now()->subDays(21),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }

        $this->command->info('Database seeded successfully!');
    }
}
