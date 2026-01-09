@extends('admin.layout')

@section('title', 'Create Staff Member')
@section('page-title', 'Add New Staff Member')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="stat-card">
            <form action="{{ route('admin.staff.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Professional Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        id="title" name="title" value="{{ old('title') }}" placeholder="e.g., Clinical Psychologist" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="specialization" class="form-label fw-semibold">Specialization</label>
                    <input type="text" class="form-control @error('specialization') is-invalid @enderror"
                        id="specialization" name="specialization" value="{{ old('specialization') }}"
                        placeholder="e.g., Anxiety & Depression" required>
                    @error('specialization')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold">Image URL</label>
                    <input type="url" class="form-control @error('photo') is-invalid @enderror"
                        id="photo" name="photo" value="{{ old('photo') }}"
                        placeholder="https://..." required>
                    @error('photo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label fw-semibold">Biography</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror"
                        id="bio" name="bio" rows="6" required>{{ old('bio') }}</textarea>
                    @error('bio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label fw-semibold">Email (Optional)</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label fw-semibold">Phone (Optional)</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                            id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Create Staff Member
                    </button>
                    <a href="{{ route('admin.staff.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection