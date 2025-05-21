<?php

namespace App\Modules\Trauma\Services;

use App\Modules\Trauma\Repositories\TraumaRepository;

class GetTraumaService
{
    public function __construct(
        private TraumaRepository $TraumaRepository
    ) {
    }

    public function getAll()
    {
        return $this->TraumaRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->TraumaRepository->findById($id);
    }
}
