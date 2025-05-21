<?php

namespace App\Modules\Trauma\Seeders;

use App\Models\Trauma;
use Illuminate\Database\Seeder;

class TraumaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $traumas = [
            ['name' => 'Neurocirurgico'],
            ['name' => 'Ortopedico'],
        ];

        foreach ($traumas as $trauma) {
            Trauma::create($trauma);
        }
    }
}
