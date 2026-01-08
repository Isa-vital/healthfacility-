@extends('admin.layout')

@section('title', 'Edit Testimonial')
@section('page-title', 'Edit Testimonial')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="stat-card">
            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="patient_name" class="form-label fw-semibold">Patient Name</label>
                    <input type="text" class="form-control @error('patient_name') is-invalid @enderror" 
                           id="patient_name" name="patient_name" value="{{ old('patient_name', $testimonial->patient_name) }}" required>
                    @error('patient_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="patient_initial" class="form-label fw-semibold">Patient Initial</label>
                    <input type="text" class="form-control @error('patient_initial') is-invalid @enderror" 
                           id="patient_initial" name="patient_initial" value="{{ old('patient_initial', $testimonial->patient_initial) }}" required>
                    @error('patient_initial')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Testimonial Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                              id="content" name="content" rows="5" required>{{ old('content', $testimonial->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="rating" class="form-label fw-semibold">Rating</label>
                        <select class="form-select @error('rating') is-invalid @enderror" 
                                id="rating" name="rating" required>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                    {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                </option>
                            @endfor
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="treatment_type" class="form-label fw-semibold">Treatment Type</label>
                        <input type="text" class="form-control @error('treatment_type') is-invalid @enderror" 
                               id="treatment_type" name="treatment_type" value="{{ old('treatment_type', $testimonial->treatment_type) }}" required>
                        @error('treatment_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_approved" 
                               id="is_approved" value="1" {{ old('is_approved', $testimonial->is_approved) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_approved">
                            Approved
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_featured" 
                               id="is_featured" value="1" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            Featured
                        </label>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Testimonial
                    </button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
