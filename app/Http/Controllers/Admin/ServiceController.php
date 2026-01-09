<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Handle file upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        } elseif ($request->filled('image_url')) {
            $validated['image'] = $request->image_url;
        }

        // Remove image_url from validated data as it's not in database
        unset($validated['image_url']);

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'nullable|url',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists and is not a URL
            if ($service->image && !str_starts_with($service->image, 'http')) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        } elseif ($request->filled('image_url')) {
            // Delete old image if it exists and is not a URL
            if ($service->image && !str_starts_with($service->image, 'http')) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->image_url;
        } else {
            // Keep existing image
            unset($validated['image']);
        }

        // Remove image_url from validated data as it's not in database
        unset($validated['image_url']);

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully!');
    }
}
