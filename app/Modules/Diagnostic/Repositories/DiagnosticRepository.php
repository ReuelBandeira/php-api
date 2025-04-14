<?php

namespace App\Modules\Diagnostic\Repositories;

use App\Modules\Diagnostic\DTOs\DiagnosticDTO;
use App\Models\Diagnostic;

class DiagnosticRepository
{
    public function getAll()
    {
        return Diagnostic::all()->map(function ($diagnostic) {
            return DiagnosticDTO::fromArray($diagnostic->toArray());
        });
    }

    public function findById(int $id)
    {
        $diagnostic = Diagnostic::findOrFail($id);
        return DiagnosticDTO::fromArray($diagnostic->toArray());
    }

    public function create(DiagnosticDTO $diagnosticDTO)
    {
        $diagnostic = Diagnostic::create([
            'name' => $diagnosticDTO->name,
        ]);

        return DiagnosticDTO::fromArray($diagnostic->toArray());
    }

    public function update(int $id, DiagnosticDTO $diagnosticDTO)
    {
        $diagnostic = Diagnostic::findOrFail($id);

        $diagnostic->update([
            'name' => $diagnosticDTO->name,
        ]);

        return DiagnosticDTO::fromArray($diagnostic->toArray());
    }

    public function delete(int $id)
    {
        $diagnostic = Diagnostic::findOrFail($id);
        $diagnostic->delete();

        return true;
    }
}
