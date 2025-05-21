<?php

namespace App\Modules\Hospital\Services;

use App\Modules\Hospital\Repositories\HospitalRepository;

class GetHospitalService
{
    public function __construct(
        private HospitalRepository $HospitalRepository
    ) {
    }

    public function getAll()
    {
        return $this->HospitalRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->HospitalRepository->findById($id);
    }
}
