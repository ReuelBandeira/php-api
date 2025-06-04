<?php

namespace App\Modules\Pupil\Seeders;

use App\Models\Pupil;
use Illuminate\Database\Seeder;

class PupilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pupil::create([
            'name' => 'Pupil 1',
        ]);

        Pupil::create([
            'name' => 'Pupil 2',
        ]);
    }
} 