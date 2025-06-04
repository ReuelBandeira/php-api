<?php

namespace App\Modules\Fracture\Services;

use App\Modules\Fracture\Repositories\FractureRepository;

class DeleteFractureService
{
    public function __construct(
        private FractureRepository $repository
    ) {
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
} 