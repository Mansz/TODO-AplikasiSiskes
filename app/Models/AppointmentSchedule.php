<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'schedule',
        'status',
    ];

    // Define relationships
    public function patient()
    {
        return $this->belongsTo(Patient::class); // Assuming you have a Patient model
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class); // Assuming you have a Doctor model
    }
}
