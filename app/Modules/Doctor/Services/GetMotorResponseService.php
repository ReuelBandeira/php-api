<?php

namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\Repositories\MotorResponseRepository;
use Illuminate\Database\Eloquent\Collection;

class GetMotorResponseService
{
    public function __construct(
        private MotorResponseRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {
        $motorResponse = $this->repository->getById($id);

        if (!$motorResponse) {
            return null;
        }

        return $motorResponse;
    }
}
