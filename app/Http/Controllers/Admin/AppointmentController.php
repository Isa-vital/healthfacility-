<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['service', 'staff'])->latest()->paginate(20);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['service', 'staff']);
        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully!');
    }
}
