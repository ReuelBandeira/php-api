<?php

namespace App\Modules\Conduct\Seeders;

use App\Models\Conduct;
use Illuminate\Database\Seeder;

class ConductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conducts = [
            ['name' => 'Repouso'],
            ['name' => 'Medicação oral'],
            ['name' => 'Medicação intravenosa'],
            ['name' => 'Fisioterapia'],
            ['name' => 'Cirurgia'],
        ];

        foreach ($conducts as $conduct) {
            Conduct::create($conduct);
        }
    }
}
