<?php

namespace App\Modules\Diagnostic\Services;

use App\Modules\Diagnostic\Repositories\DiagnosticRepository;

class DeleteDiagnosticService
{
    public function __construct(
        private DiagnosticRepository $diagnosticRepository
    ) {
    }

    public function execute(int $id)
    {
        return $this->diagnosticRepository->delete($id);
    }
}
