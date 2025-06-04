<?php

namespace App\Modules\MotorResponse\Services;

use App\Modules\MotorResponse\Repositories\MotorResponseRepository;

class DeleteMotorResponseService
{
    public function __construct(
        private MotorResponseRepository $repository
    ) {
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
