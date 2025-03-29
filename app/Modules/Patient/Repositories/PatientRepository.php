<?php

namespace App\Modules\Patient\Repositories;

use App\Models\Patient;
use App\Modules\Patient\DTOs\PatientDTO;
use Illuminate\Database\Eloquent\Collection;

class PatientRepository
{
    public function __construct(
        private Patient $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id): ?Patient
    {
        return $this->model->find($id);
    }

    public function create(PatientDTO $patientDTO): Patient
    {
        return $this->model->create($patientDTO->toArray());
    }

    public function update(PatientDTO $patientDTO): ?Patient
    {
        $patient = $this->getById($patientDTO->id);
        
        if (!$patient) {
            return null;
        }

        $patient->update($patientDTO->toArray());
        
        return $patient;
    }

    public function delete(int $id): bool
    {
        $patient = $this->getById($id);
        
        if (!$patient) {
            return false;
        }
        
        return $patient->delete();
    }
}