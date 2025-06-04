<?php

namespace App\Modules\Fracture\Repositories;

use App\Models\Fracture;
use App\Modules\Fracture\DTOs\FractureDTO;
use Illuminate\Database\Eloquent\Collection;

class FractureRepository
{
    public function __construct(
        private Fracture $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id): ?Fracture
    {
        return $this->model->find($id);
    }

    public function create(FractureDTO $fractureDTO): Fracture
    {
        return $this->model->create($fractureDTO->toArray());
    }

    public function update(FractureDTO $fractureDTO): ?Fracture
    {
        $fracture = $this->getById($fractureDTO->id);

        if (!$fracture) {
            return null;
        }

        $fracture->update($fractureDTO->toArray());

        return $fracture;
    }

    public function delete(int $id): bool
    {
        $fracture = $this->getById($id);

        if (!$fracture) {
            return false;
        }

        return $fracture->delete();
    }
} 