@extends('admin.layout')

@section('title', 'Edit Blog Post')
@section('page-title', 'Edit Blog Post')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="stat-card">
            <form action="{{ route('admin.blog.update', $blog) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Post Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="category" class="form-label fw-semibold">Category</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror"
                            id="category" name="category" value="{{ old('category', $blog->category) }}" required>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="featured_image" class="form-label fw-semibold">Featured Image URL</label>
                    <input type="url" class="form-control @error('featured_image') is-invalid @enderror"
                        id="featured_image" name="featured_image" value="{{ old('featured_image', $blog->featured_image) }}" required>
                    @error('featured_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="excerpt" class="form-label fw-semibold">Excerpt</label>
                    <textarea class="form-control @error('excerpt') is-invalid @enderror"
                        id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="form-label fw-semibold">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror"
                        id="content" name="content" rows="15" required>{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Post
                    </button>
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection