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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Preferred Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                        <td class="fw-semibold">{{ $appointment->name }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ $appointment->service->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->preferred_date)->format('M d, Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $appointment->status == 'pending' ? 'warning' : ($appointment->status == 'confirmed' ? 'success' : 'info') }}">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
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
