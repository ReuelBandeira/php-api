<?php

namespace App\Modules\Trauma\Services;

use App\Modules\Trauma\DTOs\TraumaDTO;
use App\Modules\Trauma\Repositories\TraumaRepository;

class CreateTraumaService
{
    public function __construct(
        private TraumaRepository $TraumaRepository
    ) {
    }

    public function execute(TraumaDTO $TraumaDTO)
    {
        return $this->TraumaRepository->create($TraumaDTO);
    }
}
