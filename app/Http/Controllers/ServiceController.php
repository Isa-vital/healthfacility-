<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->orderBy('title')
            ->get();

        $categories = Service::where('is_active', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        return view('services.index', compact('services', 'categories'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedServices = Service::where('category', $service->category)
            ->where('id', '!=', $service->id)
            ->where('is_active', true)
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
