<?php

namespace App\Modules\Pupil\Repositories;

use App\Models\Pupil;
use App\Modules\Pupil\DTOs\PupilDTO;
use Illuminate\Database\Eloquent\Collection;

class PupilRepository
{
    public function __construct(
        private Pupil $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id): ?Pupil
    {
        return $this->model->find($id);
    }

    public function create(PupilDTO $pupilDTO): Pupil
    {
        return $this->model->create($pupilDTO->toArray());
    }

    public function update(PupilDTO $pupilDTO): ?Pupil
    {
        $pupil = $this->getById($pupilDTO->id);
        
        if (!$pupil) {
            return null;
        }

        $pupil->update($pupilDTO->toArray());
        
        return $pupil;
    }

    public function delete(int $id): bool
    {
        $pupil = $this->getById($id);
        
        if (!$pupil) {
            return false;
        }
        
        return $pupil->delete();
    }
} 