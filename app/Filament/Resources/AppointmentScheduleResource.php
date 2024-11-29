<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentScheduleResource\Pages;
use App\Filament\Resources\AppointmentScheduleResource\RelationManagers;
use App\Models\AppointmentSchedule;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\BadgeColumn;

class AppointmentScheduleResource extends Resource
{
    protected static ?string $model = AppointmentSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'Janji Temu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('patient_id')
                    ->label('Patient')
                    ->options(Patient::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\Select::make('doctor_id')
                    ->label('Doctor')
                    ->options(Doctor::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\DateTimePicker::make('schedule')
                    ->label('Appointment Schedule')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'canceled' => 'Canceled',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient.name')->label('Patient'),
                Tables\Columns\TextColumn::make('doctor.name')->label('Doctor'),
                Tables\Columns\TextColumn::make('schedule')
        ->label('Scheduled At')
        ->formatStateUsing(fn ($state) => Carbon::parse($state)->format('M d, Y H:i')) // Format the date and time
        ->sortable(),

        Tables\Columns\BadgeColumn::make('status')
        ->formatStateUsing(fn ($state) => [
            'pending' => 'Pending',
            'confirmed' => 'Confirmed',
            'canceled' => 'Canceled',
        ][$state] ?? 'Unknown') // Custom mapping for status
        ->colors([
            'warning' => 'pending',
            'success' => 'confirmed',
            'danger' => 'canceled',
        ])
        ->sortable(),
])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'canceled' => 'Canceled',
                    ]),
            
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointmentSchedules::route('/'),
            'create' => Pages\CreateAppointmentSchedule::route('/create'),
            'edit' => Pages\EditAppointmentSchedule::route('/{record}/edit'),
        ];
    }
}
