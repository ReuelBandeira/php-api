<?php

namespace App\Modules\Diagnostic\Services;

use App\Modules\Diagnostic\DTOs\DiagnosticDTO;
use App\Modules\Diagnostic\Repositories\DiagnosticRepository;

class UpdateDiagnosticService
{
    public function __construct(
        private DiagnosticRepository $diagnosticRepository
    ) {
    }

    public function execute(int $id, DiagnosticDTO $diagnosticDTO)
    {
        return $this->diagnosticRepository->update($id, $diagnosticDTO);
    }
}
