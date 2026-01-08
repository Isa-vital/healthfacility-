<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\BlogPost;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'staff' => Staff::count(),
            'appointments' => Appointment::whereDate('created_at', today())->count(),
            'total_appointments' => Appointment::count(),
            'testimonials' => Testimonial::where('is_approved', true)->count(),
            'blog_posts' => BlogPost::count(),
        ];

        $recent_appointments = Appointment::with('service')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_appointments'));
    }
}
