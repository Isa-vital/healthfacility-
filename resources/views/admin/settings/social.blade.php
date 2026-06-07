@extends('admin.layout')

@section('title', 'Social Media Links')
@section('page-title', 'Social Media Links')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h5 class="mb-1">Manage Social Media Links</h5>
        <p class="text-muted small mb-0">Add the full URL for each profile. Leave a field blank to hide that icon from the website footer.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="stat-card">
    <form action="{{ route('admin.settings.social.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            @foreach($settings as $s)
                <div class="col-md-6">
                    <label for="setting_{{ $s->key }}" class="form-label fw-semibold">
                        <i class="bi {{ $s->icon }} me-1" style="color: var(--primary-blue);"></i>
                        {{ $s->label }}
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                        <input
                            type="url"
                            id="setting_{{ $s->key }}"
                            name="values[{{ $s->key }}]"
                            value="{{ old('values.'.$s->key, $s->value) }}"
                            class="form-control @error('values.'.$s->key) is-invalid @enderror"
                            placeholder="https://{{ strtolower(explode(' ', $s->label)[0]) }}.com/yourprofile"
                            inputmode="url">
                        @error('values.'.$s->key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Save Changes
            </button>
        </div>
    </form>
</div>

<div class="alert alert-info mt-4 d-flex align-items-start gap-2 small">
    <i class="bi bi-info-circle fs-5"></i>
    <div>
        <strong>Tip:</strong> Only social media icons with a URL will appear in the website footer. Use full URLs starting with <code>https://</code>.
    </div>
</div>
@endsection
