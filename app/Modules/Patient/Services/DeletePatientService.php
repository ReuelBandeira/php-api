<?php
// DeletePatientService.php
namespace App\Modules\Patient\Services;

use App\Modules\Patient\Repositories\PatientRepository;

class DeletePatientService
{
    public function __construct(
        private PatientRepository $repository
    ) {
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}