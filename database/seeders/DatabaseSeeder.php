<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            \App\Modules\Doctor\Seeders\DoctorSeeder::class,
            \App\Modules\Patient\Seeders\PatientSeeder::class,
            \App\Modules\Diagnostic\Seeders\DiagnosticSeeder::class,
            \App\Modules\Conduct\Seeders\ConductSeeder::class,
            \App\Modules\Trauma\Seeders\TraumaSeeder::class,
            \App\Modules\Hospital\Seeders\HospitalSeeder::class,
            \App\Modules\Doctor\Seeders\MotorResponseSeeder::class,
            \App\Modules\Pupil\Seeders\PupilSeeder::class,
        ]);
    }
}
