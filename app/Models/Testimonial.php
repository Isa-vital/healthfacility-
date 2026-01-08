<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'patient_name',
        'patient_initial',
        'content',
        'rating',
        'treatment_type',
        'is_approved',
        'is_featured'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
    ];
}
