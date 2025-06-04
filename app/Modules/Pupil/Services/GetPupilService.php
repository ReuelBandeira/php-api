<?php

namespace App\Modules\Pupil\Services;

use App\Modules\Pupil\Repositories\PupilRepository;
use Illuminate\Database\Eloquent\Collection;

class GetPupilService
{
    public function __construct(
        private PupilRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {
        $pupil = $this->repository->getById($id);
        
        if (!$pupil) {
            return null;
        }
        
        return $pupil;
    }
} 