<?php

namespace App\Modules\Deficit\Services;

use App\Modules\Deficit\Repositories\DeficitRepository;

class GetDeficitService
{
    public function __construct(
        private DeficitRepository $deficitRepository
    ) {
    }

    public function getAll()
    {
        return $this->deficitRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->deficitRepository->findById($id);
    }
}
