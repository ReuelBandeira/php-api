<?php

namespace App\Modules\Patient\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::create([
            'name' => 'Michael Johnson',
            'age' => 45,
        ]);

        Patient::create([
            'name' => 'Susan Williams',
            'age' => 32,
        ]);

        Patient::create([
            'name' => 'Robert Brown',
            'age' => 68,
        ]);
    }
}