@extends('layouts.app')

@section('title', 'Book Appointment - Global Mental Healthcare Association')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(44,95,141,0.5), rgba(63,170,122,0.5)), url('https://images.unsplash.com/photo-1516549655169-df83a0774514?w=1920&q=80') center/cover; min-height: 50vh; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-3 fw-bold mb-4 text-white">Schedule Your Appointment</h1>
        <p class="lead fs-3 text-white">Take the first step towards better mental health</p>
    </div>
</section>

<div class="spacer-lg"></div>

<!-- Appointment Form -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <form action="{{ route('appointments.store') }}" method="POST">
                            @csrf

                            <h4 class="mb-4">
                                <span class="card-icon-small me-2">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                Personal Information
                            </h4>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="patient_name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control @error('patient_name') is-invalid @enderror"
                                        id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required>
                                    @error('patient_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="patient_email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('patient_email') is-invalid @enderror"
                                        id="patient_email" name="patient_email" value="{{ old('patient_email') }}" required>
                                    @error('patient_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="patient_phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control @error('patient_phone') is-invalid @enderror"
                                        id="patient_phone" name="patient_phone" value="{{ old('patient_phone') }}" required>
                                    @error('patient_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="is_new_patient" class="form-label">Patient Status</label>
                                    <select class="form-select" id="is_new_patient" name="is_new_patient">
                                        <option value="1" {{ old('is_new_patient') == '1' ? 'selected' : '' }}>New Patient</option>
                                        <option value="0" {{ old('is_new_patient') == '0' ? 'selected' : '' }}>Existing Patient</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-4">
                                <span class="card-icon-small me-2">
                                    <i class="bi bi-calendar-check"></i>
                                </span>
                                Appointment Details
                            </h4>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="service_id" class="form-label">Service Type</label>
                                    <select class="form-select @error('service_id') is-invalid @enderror"
                                        id="service_id" name="service_id">
                                        <option value="">Select a service (optional)</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="staff_id" class="form-label">Preferred Provider</label>
                                    <select class="form-select @error('staff_id') is-invalid @enderror"
                                        id="staff_id" name="staff_id">
                                        <option value="">No preference</option>
                                        @foreach($staff as $member)
                                        <option value="{{ $member->id }}" {{ old('staff_id') == $member->id ? 'selected' : '' }}>
                                            {{ $member->name }} - {{ $member->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('staff_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="preferred_date" class="form-label">Preferred Date *</label>
                                    <input type="date" class="form-control @error('preferred_date') is-invalid @enderror"
                                        id="preferred_date" name="preferred_date" value="{{ old('preferred_date') }}"
                                        min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
                                    @error('preferred_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="preferred_time" class="form-label">Preferred Time *</label>
                                    <select class="form-select @error('preferred_time') is-invalid @enderror"
                                        id="preferred_time" name="preferred_time" required>
                                        <option value="">Select a time</option>
                                        <option value="8:00 AM" {{ old('preferred_time') == '8:00 AM' ? 'selected' : '' }}>8:00 AM</option>
                                        <option value="9:00 AM" {{ old('preferred_time') == '9:00 AM' ? 'selected' : '' }}>9:00 AM</option>
                                        <option value="10:00 AM" {{ old('preferred_time') == '10:00 AM' ? 'selected' : '' }}>10:00 AM</option>
                                        <option value="11:00 AM" {{ old('preferred_time') == '11:00 AM' ? 'selected' : '' }}>11:00 AM</option>
                                        <option value="12:00 PM" {{ old('preferred_time') == '12:00 PM' ? 'selected' : '' }}>12:00 PM</option>
                                        <option value="1:00 PM" {{ old('preferred_time') == '1:00 PM' ? 'selected' : '' }}>1:00 PM</option>
                                        <option value="2:00 PM" {{ old('preferred_time') == '2:00 PM' ? 'selected' : '' }}>2:00 PM</option>
                                        <option value="3:00 PM" {{ old('preferred_time') == '3:00 PM' ? 'selected' : '' }}>3:00 PM</option>
                                        <option value="4:00 PM" {{ old('preferred_time') == '4:00 PM' ? 'selected' : '' }}>4:00 PM</option>
                                        <option value="5:00 PM" {{ old('preferred_time') == '5:00 PM' ? 'selected' : '' }}>5:00 PM</option>
                                        <option value="6:00 PM" {{ old('preferred_time') == '6:00 PM' ? 'selected' : '' }}>6:00 PM</option>
                                    </select>
                                    @error('preferred_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="appointment_type" class="form-label">Appointment Type *</label>
                                    <div class="row g-2">
                                        <div class="col-md-4">
                                            <input type="radio" class="btn-check" name="appointment_type" id="in-person" value="in-person"
                                                {{ old('appointment_type') == 'in-person' ? 'checked' : '' }} required>
                                            <label class="btn btn-outline-primary w-100" for="in-person">
                                                <i class="bi bi-building"></i><br>In-Person
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" class="btn-check" name="appointment_type" id="virtual" value="virtual"
                                                {{ old('appointment_type') == 'virtual' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary w-100" for="virtual">
                                                <i class="bi bi-camera-video"></i><br>Virtual (Video)
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" class="btn-check" name="appointment_type" id="phone" value="phone"
                                                {{ old('appointment_type') == 'phone' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary w-100" for="phone">
                                                <i class="bi bi-telephone"></i><br>Phone
                                            </label>
                                        </div>
                                    </div>
                                    @error('appointment_type')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="insurance_provider" class="form-label">Insurance Provider</label>
                                    <input type="text" class="form-control @error('insurance_provider') is-invalid @enderror"
                                        id="insurance_provider" name="insurance_provider" value="{{ old('insurance_provider') }}"
                                        placeholder="e.g., Blue Cross, Aetna, Self-Pay">
                                    @error('insurance_provider')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="reason" class="form-label">Reason for Appointment</label>
                                    <textarea class="form-control @error('reason') is-invalid @enderror"
                                        id="reason" name="reason" rows="4"
                                        placeholder="Please briefly describe your concerns or reasons for seeking care (optional)">{{ old('reason') }}</textarea>
                                    @error('reason')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">This information helps us provide better care.</small>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="alert alert-info border-0 shadow-sm">
                                <i class="bi bi-info-circle-fill"></i>
                                <strong>Please Note:</strong> This is an appointment request. We will contact you within 24 hours to confirm your appointment time.
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg shadow">
                                    <i class="bi bi-calendar-check"></i> Submit Appointment Request
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection