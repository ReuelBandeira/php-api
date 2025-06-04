<?php

namespace App\Modules\MotorResponse\Services;

use App\Modules\MotorResponse\DTOs\MotorResponseDTO;
use App\Modules\MotorResponse\Repositories\MotorResponseRepository;

class UpdateMotorResponseService
{
    public function __construct(
        private MotorResponseRepository $repository
    ) {
    }

    public function execute(MotorResponseDTO $motorResponseDTO)
    {
        return $this->repository->update($motorResponseDTO);
    }
}
