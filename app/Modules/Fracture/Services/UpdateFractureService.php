<?php

namespace App\Modules\Fracture\Services;

use App\Modules\Fracture\DTOs\FractureDTO;
use App\Modules\Fracture\Repositories\FractureRepository;

class UpdateFractureService
{
    public function __construct(
        private FractureRepository $repository
    ) {
    }

    public function execute(FractureDTO $fractureDTO)
    {
        return $this->repository->update($fractureDTO);
    }
} 