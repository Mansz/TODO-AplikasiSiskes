<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\DashboardStatistik;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\AppointmentSchedule;
use App\Models\MedicalRecord;
use Carbon\Carbon;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';
    // Method to get total patients
    public function getTotalPatients()
    {
        return Patient::count();
    }

    // Method to get total doctors
    public function getTotalDoctors()
    {
        return Doctor::count();
    }

    // Method to get total appointments
    public function getTotalAppointments()
    {
        return AppointmentSchedule::count();
    }

    // Get widgets for the dashboard
    protected function getWidgets(): array
    {
        return [
            // Add necessary widgets here
        ];
    }
    public function getMedicalRecordData()
    {
        $records = MedicalRecord::selectRaw('COUNT(*) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        foreach ($records as $record) {
            $labels[] = Carbon::create()->month($record->month)->format('F');
            $data[] = $record->total;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }
}
