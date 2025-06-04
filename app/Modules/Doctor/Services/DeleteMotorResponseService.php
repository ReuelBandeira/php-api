<?php

namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\Repositories\MotorResponseRepository;

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
