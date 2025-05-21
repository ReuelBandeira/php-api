<?php

namespace App\Modules\Hospital\Services;

use App\Modules\Hospital\DTOs\HospitalDTO;
use App\Modules\Hospital\Repositories\HospitalRepository;

class UpdateHospitalService
{
    public function __construct(
        private HospitalRepository $HospitalRepository
    ) {
    }

    public function execute(int $id, HospitalDTO $HospitalDTO)
    {
        return $this->HospitalRepository->update($id, $HospitalDTO);
    }
}
