<?php

namespace App\Modules\VerbalResponse\Services;

use App\Models\VerbalResponse;
use App\Modules\VerbalResponse\DTOs\VerbalResponseDTO;
use App\Modules\VerbalResponse\Repositories\VerbalResponseRepository;

class UpdateVerbalResponseService
{
    public function __construct(
        private VerbalResponseRepository $repository
    ) {
    }

    public function execute(VerbalResponseDTO $verbalResponseDTO): ?VerbalResponse
    {
        return $this->repository->update($verbalResponseDTO);
    }
}
