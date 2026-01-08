@extends('admin.layout')

@section('title', 'Staff Members')
@section('page-title', 'Staff Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">All Staff Members</h5>
    <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New Staff Member
    </a>
</div>

<div class="stat-card">
    @if($staff->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Specialization</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff as $member)
                    <tr>
                        <td class="fw-semibold">{{ $member->name }}</td>
                        <td>{{ $member->title }}</td>
                        <td>{{ $member->specialization }}</td>
                        <td>{{ $member->email ?? 'N/A' }}</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.staff.edit', $member) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.staff.destroy', $member) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this staff member?')">
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
        <p class="text-muted text-center py-5">No staff members found. <a href="{{ route('admin.staff.create') }}">Add your first staff member</a>.</p>
    @endif
</div>
@endsection
