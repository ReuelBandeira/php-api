<?php

namespace App\Modules\Deficit\Services;

use App\Modules\Deficit\DTOs\DeficitDTO;
use App\Modules\Deficit\Repositories\DeficitRepository;

class CreateDeficitService
{
    public function __construct(
        private DeficitRepository $deficitRepository
    ) {
    }

    public function execute(DeficitDTO $deficitDTO)
    {
        return $this->deficitRepository->create($deficitDTO);
    }
}
