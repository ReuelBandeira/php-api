<?php
// UpdatePatientService.php
namespace App\Modules\Patient\Services;

use App\Modules\Patient\DTOs\PatientDTO;
use App\Modules\Patient\Repositories\PatientRepository;

class UpdatePatientService
{
    public function __construct(
        private PatientRepository $repository
    ) {
    }

    public function execute(PatientDTO $patientDTO)
    {
        return $this->repository->update($patientDTO);
    }
}