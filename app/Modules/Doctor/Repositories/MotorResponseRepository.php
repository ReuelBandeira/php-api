<?php

namespace App\Modules\Doctor\Repositories;

use App\Models\MotorResponse;
use App\Modules\Doctor\DTOs\MotorResponseDTO;
use Illuminate\Database\Eloquent\Collection;

class MotorResponseRepository
{
    public function __construct(
        private MotorResponse $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id): ?MotorResponse
    {
        return $this->model->find($id);
    }

    public function create(MotorResponseDTO $motorResponseDTO): MotorResponse
    {
        return $this->model->create($motorResponseDTO->toArray());
    }

    public function update(MotorResponseDTO $motorResponseDTO): ?MotorResponse
    {
        $motorResponse = $this->getById($motorResponseDTO->id);

        if (!$motorResponse) {
            return null;
        }

        $motorResponse->update($motorResponseDTO->toArray());

        return $motorResponse;
    }

    public function delete(int $id): bool
    {
        $motorResponse = $this->getById($id);

        if (!$motorResponse) {
            return false;
        }

        return $motorResponse->delete();
    }
}
