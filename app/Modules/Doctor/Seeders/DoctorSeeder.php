<?php

namespace App\Modules\Doctor\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'name' => 'Dr. John Doe',
            'phone' => '+1 123-456-7890',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
            'type' => 'Cardiologist',
        ]);

        Doctor::create([
            'name' => 'Dr. Jane Smith',
            'phone' => '+1 987-654-3210',
            'email' => 'jane.smith@example.com',
            'password' => Hash::make('password123'),
            'type' => 'Neurologist',
        ]);
    }
}