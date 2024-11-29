<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'specialization',
        'contact',
    ];

    /**
     * Relationship: A doctor can have many appointments.
     */
    public function appointments()
    {
        return $this->hasMany(AppointmentSchedule::class);
    }
}
