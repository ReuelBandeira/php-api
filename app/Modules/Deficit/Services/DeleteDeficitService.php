<?php

namespace App\Modules\Deficit\Services;

use App\Modules\Deficit\Repositories\DeficitRepository;

class DeleteDeficitService
{
    public function __construct(
        private DeficitRepository $deficitRepository
    ) {
    }

    public function execute(int $id)
    {
        return $this->deficitRepository->delete($id);
    }
}
