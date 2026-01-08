<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'staff_id',
        'service_id',
        'patient_name',
        'patient_email',
        'patient_phone',
        'preferred_date',
        'preferred_time',
        'appointment_type',
        'reason',
        'notes',
        'status',
        'is_new_patient',
        'insurance_provider'
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'is_new_patient' => 'boolean',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
