<?php

namespace App\Modules\Fracture\Services;

use App\Modules\Fracture\Repositories\FractureRepository;
use Illuminate\Database\Eloquent\Collection;

class GetFractureService
{
    public function __construct(
        private FractureRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {
        $fracture = $this->repository->getById($id);

        if (!$fracture) {
            return null;
        }

        return $fracture;
    }
} 