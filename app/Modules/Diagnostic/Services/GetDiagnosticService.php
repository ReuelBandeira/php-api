<?php

namespace App\Modules\Diagnostic\Services;

use App\Modules\Diagnostic\Repositories\DiagnosticRepository;

class GetDiagnosticService
{
    public function __construct(
        private DiagnosticRepository $diagnosticRepository
    ) {
    }

    public function getAll()
    {
        return $this->diagnosticRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->diagnosticRepository->findById($id);
    }
}
