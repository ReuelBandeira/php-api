<?php

namespace App\Modules\Fracture\Services;

use App\Modules\Fracture\DTOs\FractureDTO;
use App\Modules\Fracture\Repositories\FractureRepository;

class CreateFractureService
{
    public function __construct(
        private FractureRepository $repository
    ) {
    }

    public function execute(FractureDTO $fractureDTO)
    {
        return $this->repository->create($fractureDTO);
    }
} 