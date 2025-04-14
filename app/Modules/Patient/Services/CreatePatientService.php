<?php
// CreatePatientService.php
namespace App\Modules\Patient\Services;

use App\Modules\Patient\DTOs\PatientDTO;
use App\Modules\Patient\Repositories\PatientRepository;

class CreatePatientService
{
    public function __construct(
        private PatientRepository $repository
    ) {
    }

    public function execute(PatientDTO $patientDTO)
    {
        return $this->repository->create($patientDTO);
    }
}