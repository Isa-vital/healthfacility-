@extends('admin.layout')

@section('title', 'Blog Posts')
@section('page-title', 'Blog Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Blog Posts</h5>
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New Post
    </a>
</div>

<div class="stat-card">
    @if($posts->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td class="fw-semibold">{{ $post->title }}</td>
                    <td><span class="badge bg-primary">{{ $post->category }}</span></td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.blog.destroy', $post) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="text-muted text-center py-5">No blog posts found. <a href="{{ route('admin.blog.create') }}">Create your first post</a>.</p>
    @endif
</div>
@endsection