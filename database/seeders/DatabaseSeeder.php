<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    ]);
    }
}
