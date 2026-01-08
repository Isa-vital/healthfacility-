<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;

class AppointmentController extends Controller
{
    public function create()
    {
        $services = Service::where('is_active', true)
            ->orderBy('title')
            ->get();

        $staff = Staff::where('accepting_patients', true)
            ->orderBy('name')
            ->get();

        return view('appointments.create', compact('services', 'staff'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'staff_id' => 'nullable|exists:staff,id',
            'service_id' => 'nullable|exists:services,id',
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|email',
            'patient_phone' => 'required|string',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string',
            'appointment_type' => 'required|in:in-person,virtual,phone',
            'reason' => 'nullable|string',
            'is_new_patient' => 'boolean',
            'insurance_provider' => 'nullable|string'
        ]);

        $appointment = Appointment::create($validated);

        // Here you would typically send confirmation email

        return redirect()->route('appointments.success')
            ->with('success', 'Your appointment request has been submitted successfully!');
    }

    public function success()
    {
        return view('appointments.success');
    }
}
