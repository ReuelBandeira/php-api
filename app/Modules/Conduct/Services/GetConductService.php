<?php

namespace App\Modules\Conduct\Services;

use App\Modules\Conduct\Repositories\ConductRepository;

class GetConductService
{
    public function __construct(
        private ConductRepository $conductRepository
    ) {
    }

    public function getAll()
    {
        return $this->conductRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->conductRepository->findById($id);
    }
}
