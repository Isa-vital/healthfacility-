@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: var(--soft-blue); color: var(--primary-blue);">
                <i class="bi bi-clipboard-pulse"></i>
            </div>
            <h3 class="mb-1 fw-bold">{{ $stats['services'] }}</h3>
            <p class="text-muted mb-0">Services</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: var(--soft-green); color: var(--primary-green);">
                <i class="bi bi-people"></i>
            </div>
            <h3 class="mb-1 fw-bold">{{ $stats['staff'] }}</h3>
            <p class="text-muted mb-0">Staff Members</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: #FFF3E0; color: #F57C00;">
                <i class="bi bi-calendar-check"></i>
            </div>
            <h3 class="mb-1 fw-bold">{{ $stats['appointments'] }}</h3>
            <p class="text-muted mb-0">Today's Appointments</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: #F3E5F5; color: #7B1FA2;">
                <i class="bi bi-journal-text"></i>
            </div>
            <h3 class="mb-1 fw-bold">{{ $stats['blog_posts'] }}</h3>
            <p class="text-muted mb-0">Blog Posts</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="stat-card">
            <h5 class="fw-bold mb-4">Recent Appointments</h5>

            @if($recent_appointments->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Service</th>
                            <th>Preferred Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent_appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->email }}</td>
                            <td>{{ $appointment->service->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->preferred_date)->format('M d, Y') }}</td>
                            <td>
                                <span class="badge bg-{{ $appointment->status == 'pending' ? 'warning' : ($appointment->status == 'confirmed' ? 'success' : 'info') }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="text-muted">No appointments yet.</p>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h5 class="fw-bold mb-4">Quick Stats</h5>
            <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">Total Appointments</span>
                <span class="fw-bold">{{ $stats['total_appointments'] }}</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">Approved Testimonials</span>
                <span class="fw-bold">{{ $stats['testimonials'] }}</span>
            </div>
            <hr>
            <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-primary w-100 mb-2">
                Manage Services
            </a>
            <a href="{{ route('admin.staff.index') }}" class="btn btn-sm btn-outline-primary w-100 mb-2">
                Manage Staff
            </a>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-outline-primary w-100">
                Manage Blog Posts
            </a>
        </div>
    </div>
</div>
@endsection