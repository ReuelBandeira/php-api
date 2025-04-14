<?php

namespace App\Modules\Diagnostic\Services;

use App\Modules\Diagnostic\DTOs\DiagnosticDTO;
use App\Modules\Diagnostic\Repositories\DiagnosticRepository;

class CreateDiagnosticService
{
    public function __construct(
        private DiagnosticRepository $diagnosticRepository
    ) {
    }

    public function execute(DiagnosticDTO $diagnosticDTO)
    {
        return $this->diagnosticRepository->create($diagnosticDTO);
    }
}
