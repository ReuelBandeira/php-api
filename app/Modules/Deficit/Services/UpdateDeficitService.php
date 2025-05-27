<?php

namespace App\Modules\Deficit\Services;

use App\Modules\Deficit\DTOs\DeficitDTO;
use App\Modules\Deficit\Repositories\DeficitRepository;

class UpdateDeficitService
{
    public function __construct(
        private DeficitRepository $deficitRepository
    ) {
    }

    public function execute(int $id, DeficitDTO $deficitDTO)
    {
        return $this->deficitRepository->update($id, $deficitDTO);
    }
}
