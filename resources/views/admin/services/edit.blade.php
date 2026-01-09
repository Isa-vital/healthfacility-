@extends('admin.layout')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="stat-card">
            <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Service Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        id="title" name="title" value="{{ old('title', $service->title) }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label fw-semibold">Icon (Bootstrap Icon name)</label>
                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                        id="icon" name="icon" value="{{ old('icon', $service->icon) }}" required>
                    <small class="text-muted">Browse icons at <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a></small>
                    @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Service Image</label>
                    @if($service->image)
                    <div class="mb-2">
                        <img src="{{ str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}"
                            alt="{{ $service->title }}" class="img-thumbnail" style="max-height: 150px;">
                        <p class="text-muted small mt-1">Current image</p>
                    </div>
                    @endif
                    <div class="mb-2">
                        <label for="image" class="form-label">Upload New Image File</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                            id="image" name="image" accept="image/*">
                        <small class="text-muted">Supported formats: JPEG, PNG, JPG, GIF, WEBP (Max: 2MB)</small>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center my-2">
                        <small class="text-muted">— OR —</small>
                    </div>
                    <div>
                        <label for="image_url" class="form-label">Enter Image URL</label>
                        <input type="url" class="form-control @error('image_url') is-invalid @enderror"
                            id="image_url" name="image_url" value="{{ old('image_url') }}"
                            placeholder="https://example.com/image.jpg">
                        <small class="text-muted">Enter a full URL to replace current image</small>
                        @error('image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                        id="description" name="description" rows="6" required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Service
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection