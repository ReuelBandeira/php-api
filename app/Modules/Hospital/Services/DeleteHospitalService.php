<?php

namespace App\Modules\Hospital\Services;

use App\Modules\Hospital\Repositories\HospitalRepository;

class DeleteHospitalService
{
    public function __construct(
        private HospitalRepository $HospitalRepository
    ) {
    }

    public function execute(int $id)
    {
        return $this->HospitalRepository->delete($id);
    }
}
