<?php

namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\DTOs\MotorResponseDTO;
use App\Modules\Doctor\Repositories\MotorResponseRepository;

class CreateMotorResponseService
{
    public function __construct(
        private MotorResponseRepository $repository
    ) {
    }

    public function execute(MotorResponseDTO $motorResponseDTO)
    {
        return $this->repository->create($motorResponseDTO);
    }
}
