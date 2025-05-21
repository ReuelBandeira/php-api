<?php

namespace App\Modules\Hospital\Services;

use App\Modules\Hospital\DTOs\HospitalDTO;
use App\Modules\Hospital\Repositories\HospitalRepository;

class CreateHospitalService
{
    public function __construct(
        private HospitalRepository $HospitalRepository
    ) {
    }

    public function execute(HospitalDTO $HospitalDTO)
    {
        return $this->HospitalRepository->create($HospitalDTO);
    }
}
