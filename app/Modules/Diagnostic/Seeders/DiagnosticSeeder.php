<?php

namespace App\Modules\Diagnostic\Seeders;

use App\Models\Diagnostic;
use Illuminate\Database\Seeder;

class DiagnosticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diagnostics = [
            ['name' => 'Hipertensão'],
            ['name' => 'Diabetes'],
            ['name' => 'Asma'],
            ['name' => 'Artrite'],
            ['name' => 'Depressão'],
        ];

        foreach ($diagnostics as $diagnostic) {
            Diagnostic::create($diagnostic);
        }
    }
}
