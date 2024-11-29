<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <x-filament::widget>
        <x-filament::stats-overview>
            <x-filament::stats-overview.card
                title="Total Patients"
                :value="$totalPatients"
                color="success"
            />
        </x-filament::stats-overview>
    </x-filament::widget>

    <x-filament::widget>
        <x-filament::stats-overview>
            <x-filament::stats-overview.card
                title="Total Doctors"
                :value="$totalDoctors"
                color="primary"
            />
        </x-filament::stats-overview>
    </x-filament::widget>

    <x-filament::widget>
        <x-filament::stats-overview>
            <x-filament::stats-overview.card
                title="Appointments Today"
                :value="$totalAppointments"
                color="warning"
            />
        </x-filament::stats-overview>
    </x-filament::widget>

    <x-filament::widget>
        <x-filament::stats-overview>
            <x-filament::stats-overview.card
                title="Total Medical Records"
                :value="$totalMedicalRecords"
                color="danger"
            />
        </x-filament::stats-overview>
    </x-filament::widget>
</div>
