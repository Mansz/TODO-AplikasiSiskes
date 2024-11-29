<x-filament::page>
    <!-- Dashboard statistics grid layout -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Total Patients Card -->
        <x-filament::card class="flex flex-col items-center justify-center p-4 shadow-lg rounded-lg border border-gray-200 bg-white w-full max-w-xs mx-auto">
            <div class="text-xl text-primary mb-2">
                <x-heroicon-o-users class="w-8 h-8" />
            </div>
            <h3 class="text-lg font-semibold text-gray-700">Total Pasien</h3>
            <p class="text-2xl font-bold text-gray-900">{{ $this->getTotalPatients() }}</p>
        </x-filament::card>

        <!-- Total Doctors Card -->
        <x-filament::card class="flex flex-col items-center justify-center p-4 shadow-lg rounded-lg border border-gray-200 bg-white w-full max-w-xs mx-auto">
            <div class="text-xl text-primary mb-2">
                <x-heroicon-o-user-group class="w-8 h-8" />
            </div>
            <h3 class="text-lg font-semibold text-gray-700">Total Doctors</h3>
            <p class="text-2xl font-bold text-gray-900">{{ $this->getTotalDoctors() }}</p>
        </x-filament::card>

        <!-- Total Appointments Card -->
        <x-filament::card class="flex flex-col items-center justify-center p-4 shadow-lg rounded-lg border border-gray-200 bg-white w-full max-w-xs mx-auto">
            <div class="text-xl text-primary mb-2">
                <x-heroicon-o-calendar class="w-8 h-8" />
            </div>
            <h3 class="text-lg font-semibold text-gray-700">Total Janji Temu</h3>
            <p class="text-2xl font-bold text-gray-900">{{ $this->getTotalAppointments() }}</p>
        </x-filament::card>

    </div>

    <!-- Line Chart for Medical Records -->
    <x-filament::card class="p-4 shadow-lg rounded-lg border border-gray-200 bg-white">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Rekam Medis</h3>
        <canvas id="medicalRecordsChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var ctx = document.getElementById('medicalRecordsChart').getContext('2d');
                var chartData = @json($this->getMedicalRecordData());

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: chartData.labels,
                        datasets: [{
                            label: 'Rekam Medis',
                            data: chartData.data,
                            borderColor: '#4CAF50',
                            backgroundColor: 'rgba(76, 175, 80, 0.2)',
                            fill: true,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Month'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Number of Records'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
    </x-filament::card>
</x-filament::page>
