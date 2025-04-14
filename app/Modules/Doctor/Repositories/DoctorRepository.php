<?php

namespace App\Modules\Doctor\Repositories;

use App\Models\Doctor;
use App\Modules\Doctor\DTOs\DoctorDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class DoctorRepository
{
    public function __construct(
        private Doctor $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id): ?Doctor
    {
        return $this->model->find($id);
    }

    public function create(DoctorDTO $doctorDTO): Doctor
    {
        $data = $doctorDTO->toArray();
        $data['password'] = Hash::make($data['password']);
        
        return $this->model->create($data);
    }

    public function update(DoctorDTO $doctorDTO): ?Doctor
    {
        $doctor = $this->getById($doctorDTO->id);
        
        if (!$doctor) {
            return null;
        }

        $data = $doctorDTO->toArray();
        
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $doctor->update($data);
        
        return $doctor;
    }

    public function delete(int $id): bool
    {
        $doctor = $this->getById($id);
        
        if (!$doctor) {
            return false;
        }
        
        return $doctor->delete();
    }
}