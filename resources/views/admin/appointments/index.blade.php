@extends('admin.layout')

@section('title', 'Appointments')
@section('page-title', 'Appointments Management')

@section('content')
<div class="stat-card">
    @if($appointments->count() > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Contact</th>
                    <th>Service</th>
                    <th>Staff</th>
                    <th>Date & Time</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td class="fw-semibold">{{ $appointment->patient_name }}</td>
                    <td>
                        <small class="d-block">{{ $appointment->patient_email }}</small>
                        <small class="text-muted">{{ $appointment->patient_phone }}</small>
                    </td>
                    <td>{{ $appointment->service->title ?? 'N/A' }}</td>
                    <td>{{ $appointment->staff->name ?? 'Any Available' }}</td>
                    <td>
                        <small class="d-block">{{ \Carbon\Carbon::parse($appointment->preferred_date)->format('M d, Y') }}</small>
                        <small class="text-muted">{{ $appointment->preferred_time }}</small>
                    </td>
                    <td>
                        <span class="badge bg-{{ $appointment->appointment_type == 'in-person' ? 'primary' : 'info' }}">
                            {{ ucfirst($appointment->appointment_type) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge bg-{{ $appointment->status == 'pending' ? 'warning' : ($appointment->status == 'confirmed' ? 'success' : 'info') }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.appointments.show', $appointment) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $appointments->links() }}
    </div>
    @else
    <p class="text-muted text-center py-5">No appointments found.</p>
    @endif
</div>
@endsection