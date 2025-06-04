<?php

namespace App\Modules\Submit\Seeders;

use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Submit;
use App\Models\Trauma;
use Illuminate\Database\Seeder;

class SubmitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some IDs to use in our seeder
        $hospitalId = Hospital::first()->id ?? 1;
        $doctorId = Doctor::first()->id ?? 1;
        $patientId = Patient::first()->id ?? 1;
        $traumaId = Trauma::first()->id ?? 1;

        Submit::create([
            'hospital_id' => $hospitalId,
            'doctor_id' => $doctorId,
            'patient_id' => $patientId,
            'trauma_id' => $traumaId,
            'status' => 'Initial assessment',
        ]);

        Submit::create([
            'hospital_id' => $hospitalId,
            'doctor_id' => $doctorId,
            'patient_id' => $patientId,
            'trauma_id' => $traumaId,
            'status' => 'Ongoing treatment',
        ]);
    }
}
