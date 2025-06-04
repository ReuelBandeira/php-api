<?php

namespace App\Modules\Fracture\Seeders;

use App\Models\Fracture;
use Illuminate\Database\Seeder;

class FractureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fracture::create([
            'presence' => 'sim',
            'location' => 'cabeça',
            'type' => 'aberto',
        ]);

        Fracture::create([
            'presence' => 'não',
            'location' => 'n.a',
            'type' => 'n.a',
        ]);
    }
}