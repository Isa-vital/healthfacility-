@extends('admin.layout')

@section('title', 'Create Service')
@section('page-title', 'Create New Service')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="stat-card">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Service Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label fw-semibold">Icon (Bootstrap Icon name)</label>
                    <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                           id="icon" name="icon" value="{{ old('icon') }}" placeholder="e.g., heart-pulse" required>
                    <small class="text-muted">Browse icons at <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a></small>
                    @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Create Service
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
