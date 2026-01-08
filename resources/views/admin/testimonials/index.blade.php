@extends('admin.layout')

@section('title', 'Testimonials')
@section('page-title', 'Testimonials Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Testimonials</h5>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New Testimonial
    </a>
</div>

<div class="stat-card">
    @if($testimonials->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Rating</th>
                        <th>Treatment</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                    <tr>
                        <td class="fw-semibold">{{ $testimonial->patient_initial }}</td>
                        <td>
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <i class="bi bi-star-fill text-warning"></i>
                            @endfor
                        </td>
                        <td>{{ $testimonial->treatment_type }}</td>
                        <td>
                            <span class="badge bg-{{ $testimonial->is_approved ? 'success' : 'secondary' }}">
                                {{ $testimonial->is_approved ? 'Approved' : 'Pending' }}
                            </span>
                        </td>
                        <td>
                            @if($testimonial->is_featured)
                                <i class="bi bi-check-circle-fill text-success"></i>
                            @else
                                <i class="bi bi-x-circle text-muted"></i>
                            @endif
                        </td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
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
        <p class="text-muted text-center py-5">No testimonials found. <a href="{{ route('admin.testimonials.create') }}">Add your first testimonial</a>.</p>
    @endif
</div>
@endsection
