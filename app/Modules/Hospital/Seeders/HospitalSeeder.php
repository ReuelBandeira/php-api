<?php

namespace App\Modules\Hospital\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospitals = [
            ['name' => 'Hospital e Pronto Socorro Dr. João Lúcio Pereira Machado'],
            ['name' => 'CHZN Complexo Hospitalar Zona Norte'],
        ];

        foreach ($hospitals as $hospital) {
            Hospital::create($hospital);
        }
    }
}
