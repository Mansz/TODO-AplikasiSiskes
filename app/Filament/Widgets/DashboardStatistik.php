<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\AppointmentSchedule; // Ensure this model is imported
use App\Models\MedicalRecord;
use Filament\Widgets\Widget;

class DashboardStatistik extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-statistik';

    // Override the getData() method instead of render
    protected function getData(): array
    {
        // Get statistics
        $totalPatients = Patient::count();
        $totalDoctors = Doctor::count();
        $totalAppointments = AppointmentSchedule::whereDate('schedule', today())->count(); // Appointments today
        $totalMedicalRecords = MedicalRecord::count();

        // Return the data as an array
        return [
            'totalPatients' => $totalPatients,
            'totalDoctors' => $totalDoctors,
            'totalAppointments' => $totalAppointments,
            'totalMedicalRecords' => $totalMedicalRecords,
        ];
    }

    public static function canView(): bool
    {
        return true; // Display widget on the dashboard
    }
}

