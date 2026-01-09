@extends('admin.layout')

@section('title', 'Appointment Details')
@section('page-title', 'Appointment Details')

@section('content')
<div class="mb-3">
    <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Appointments
    </a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="stat-card mb-4">
            <h5 class="mb-4 pb-3 border-bottom">Patient Information</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="text-muted small">Full Name</label>
                    <p class="fw-semibold mb-0">{{ $appointment->patient_name }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Email Address</label>
                    <p class="mb-0">{{ $appointment->patient_email }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Phone Number</label>
                    <p class="mb-0">{{ $appointment->patient_phone }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Patient Type</label>
                    <p class="mb-0">
                        <span class="badge bg-{{ $appointment->is_new_patient ? 'info' : 'success' }}">
                            {{ $appointment->is_new_patient ? 'New Patient' : 'Returning Patient' }}
                        </span>
                    </p>
                </div>
                @if($appointment->insurance_provider)
                <div class="col-md-6">
                    <label class="text-muted small">Insurance Provider</label>
                    <p class="mb-0">{{ $appointment->insurance_provider }}</p>
                </div>
                @endif
            </div>
        </div>

        <div class="stat-card mb-4">
            <h5 class="mb-4 pb-3 border-bottom">Appointment Details</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="text-muted small">Service Requested</label>
                    <p class="fw-semibold mb-0">{{ $appointment->service->title ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Preferred Staff</label>
                    <p class="mb-0">{{ $appointment->staff->name ?? 'Any Available' }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Preferred Date</label>
                    <p class="mb-0">{{ \Carbon\Carbon::parse($appointment->preferred_date)->format('l, F j, Y') }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Preferred Time</label>
                    <p class="mb-0">{{ $appointment->preferred_time }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Appointment Type</label>
                    <p class="mb-0">
                        <span class="badge bg-{{ $appointment->appointment_type == 'in-person' ? 'primary' : 'info' }}">
                            {{ ucfirst($appointment->appointment_type) }}
                        </span>
                    </p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted small">Status</label>
                    <p class="mb-0">
                        <span class="badge bg-{{ $appointment->status == 'pending' ? 'warning' : ($appointment->status == 'confirmed' ? 'success' : 'info') }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        @if($appointment->reason)
        <div class="stat-card mb-4">
            <h5 class="mb-3 pb-3 border-bottom">Reason for Visit</h5>
            <p class="mb-0">{{ $appointment->reason }}</p>
        </div>
        @endif

        @if($appointment->notes)
        <div class="stat-card mb-4">
            <h5 class="mb-3 pb-3 border-bottom">Additional Notes</h5>
            <p class="mb-0">{{ $appointment->notes }}</p>
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="stat-card mb-4">
            <h5 class="mb-4 pb-3 border-bottom">Quick Actions</h5>
            <div class="d-grid gap-2">
                <a href="mailto:{{ $appointment->patient_email }}" class="btn btn-outline-primary">
                    <i class="bi bi-envelope"></i> Send Email
                </a>
                <a href="tel:{{ $appointment->patient_phone }}" class="btn btn-outline-primary">
                    <i class="bi bi-telephone"></i> Call Patient
                </a>
                <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="bi bi-trash"></i> Delete Appointment
                    </button>
                </form>
            </div>
        </div>

        <div class="stat-card">
            <h5 class="mb-3 pb-3 border-bottom">Submission Info</h5>
            <div class="small">
                <p class="text-muted mb-2">
                    <strong>Submitted:</strong><br>
                    {{ $appointment->created_at->format('M d, Y') }} at {{ $appointment->created_at->format('g:i A') }}
                </p>
                @if($appointment->updated_at != $appointment->created_at)
                <p class="text-muted mb-0">
                    <strong>Last Updated:</strong><br>
                    {{ $appointment->updated_at->format('M d, Y') }} at {{ $appointment->updated_at->format('g:i A') }}
                </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection