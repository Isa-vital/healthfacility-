@extends('admin.layout')

@section('title', 'Services')
@section('page-title', 'Services Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Services</h5>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New Service
    </a>
</div>

<div class="stat-card">
    @if($services->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td class="fw-semibold">{{ $service->title }}</td>
                    <td><i class="bi bi-{{ $service->icon }} fs-4" style="color: var(--primary-blue);"></i></td>
                    <td>{{ Str::limit($service->description, 100) }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this service?')">
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
    <p class="text-muted text-center py-5">No services found. <a href="{{ route('admin.services.create') }}">Create your first service</a>.</p>
    @endif
</div>
@endsection