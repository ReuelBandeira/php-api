<?php

namespace App\Modules\Doctor\Seeders;

use App\Models\MotorResponse;
use Illuminate\Database\Seeder;

class MotorResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MotorResponse::create([
            'name' => 'Normal Movement',
        ]);

        MotorResponse::create([
            'name' => 'Limited Movement',
        ]);

        MotorResponse::create([
            'name' => 'No Movement',
        ]);
    }
}
