<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Testimonial;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        $featuredStaff = Staff::where('is_featured', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        $testimonials = Testimonial::where('is_approved', true)
            ->where('is_featured', true)
            ->latest()
            ->take(3)
            ->get();

        $recentPosts = BlogPost::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('featuredServices', 'featuredStaff', 'testimonials', 'recentPosts'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Here you would typically send an email or save to database

        return back()->with('success', 'Thank you for contacting us. We will get back to you soon!');
    }
}
