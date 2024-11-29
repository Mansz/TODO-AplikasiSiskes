<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'contact',
    ];

    /**
     * Relationship: A patient can have many medical records.
     */
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    /**
     * Relationship: A patient can have many appointments.
     */
    public function appointments()
    {
        return $this->hasMany(AppointmentSchedule::class);
    }
}
