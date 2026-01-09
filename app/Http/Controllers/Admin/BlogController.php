<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::latest()->get();
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'required|max:500',
            'featured_image' => 'required|url',
            'category' => 'required|max:100',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['read_time'] = ceil(str_word_count(strip_tags($validated['content'])) / 200);
        $validated['author_id'] = auth()->id();
        $validated['is_published'] = true;
        $validated['published_at'] = now();
        $validated['views'] = 0;

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully!');
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'required|max:500',
            'featured_image' => 'required|url',
            'category' => 'required|max:100',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['read_time'] = ceil(str_word_count(strip_tags($validated['content'])) / 200);

        // Set author_id if not already set
        if (!$blog->author_id) {
            $validated['author_id'] = auth()->id();
        }

        // Set as published if not already published
        if (!$blog->is_published) {
            $validated['is_published'] = true;
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog post deleted successfully!');
    }
}
