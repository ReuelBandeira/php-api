<?php
// GetPatientService.php
namespace App\Modules\Patient\Services;

use App\Modules\Patient\DTOs\PatientDTO;
use App\Modules\Patient\Repositories\PatientRepository;
use Illuminate\Database\Eloquent\Collection;

class GetPatientService
{
    public function __construct(
        private PatientRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {
        $patient = $this->repository->getById($id);
        
        if (!$patient) {
            return null;
        }
        
        return $patient;
    }
}