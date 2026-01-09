<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with('author')
            ->where('is_published', true)
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogPost::where('is_published', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = BlogPost::with('author')
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Increment views
        $post->increment('views');

        $relatedPosts = BlogPost::where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
