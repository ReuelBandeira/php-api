<?php

namespace App\Modules\Trauma\Services;

use App\Modules\Trauma\DTOs\TraumaDTO;
use App\Modules\Trauma\Repositories\TraumaRepository;

class UpdateTraumaService
{
    public function __construct(
        private TraumaRepository $TraumaRepository
    ) {
    }

    public function execute(int $id, TraumaDTO $TraumaDTO)
    {
        return $this->TraumaRepository->update($id, $TraumaDTO);
    }
}
