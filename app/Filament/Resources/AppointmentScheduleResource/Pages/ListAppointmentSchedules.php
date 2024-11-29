<?php

namespace App\Filament\Resources\AppointmentScheduleResource\Pages;

use App\Filament\Resources\AppointmentScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointmentSchedules extends ListRecords
{
    protected static string $resource = AppointmentScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
