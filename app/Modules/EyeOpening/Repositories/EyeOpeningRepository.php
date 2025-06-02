<?php

namespace App\Modules\EyeOpening\Repositories;

use App\Modules\EyeOpening\Models\EyeOpening;
use App\Modules\EyeOpening\DTOs\EyeOpeningDTO;
use Illuminate\Database\Eloquent\Collection;

class EyeOpeningRepository
{
    public function __construct(
        protected EyeOpening $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function findById(int $id): ?EyeOpening
    {
        return $this->model->find($id);
    }

    public function create(EyeOpeningDTO $dto): EyeOpening
    {
        return $this->model->create($dto->toArray());
    }

    public function update(EyeOpening $eyeOpening, EyeOpeningDTO $dto): bool
    {
        return $eyeOpening->update($dto->toArray());
    }

    public function delete(EyeOpening $eyeOpening): bool
    {
        return $eyeOpening->delete();
    }
}
