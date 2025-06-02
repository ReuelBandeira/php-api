<?php

namespace App\Modules\VerbalResponse\Repositories;

use App\Models\VerbalResponse;
use App\Modules\VerbalResponse\DTOs\VerbalResponseDTO;
use Illuminate\Database\Eloquent\Collection;

class VerbalResponseRepository
{
    public function __construct(
        private VerbalResponse $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id): ?VerbalResponse
    {
        return $this->model->find($id);
    }

    public function create(VerbalResponseDTO $verbalResponseDTO): VerbalResponse
    {
        return $this->model->create($verbalResponseDTO->toArray());
    }

    public function update(VerbalResponseDTO $verbalResponseDTO): ?VerbalResponse
    {
        $verbalResponse = $this->getById($verbalResponseDTO->id);

        if (!$verbalResponse) {
            return null;
        }

        $verbalResponse->update($verbalResponseDTO->toArray());
        return $verbalResponse->fresh();
    }

    public function delete(int $id): bool
    {
        $verbalResponse = $this->getById($id);

        if (!$verbalResponse) {
            return false;
        }

        return $verbalResponse->delete();
    }
}