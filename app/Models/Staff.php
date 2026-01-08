<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'specialization',
        'bio',
        'photo',
        'email',
        'phone',
        'credentials',
        'expertise',
        'languages',
        'accepting_patients',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'credentials' => 'array',
        'expertise' => 'array',
        'languages' => 'array',
        'accepting_patients' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
