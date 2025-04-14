<?php

namespace App\Modules\Conduct\Services;

use App\Modules\Conduct\DTOs\ConductDTO;
use App\Modules\Conduct\Repositories\ConductRepository;

class CreateConductService
{
    public function __construct(
        private ConductRepository $conductRepository
    ) {
    }

    public function execute(ConductDTO $conductDTO)
    {
        return $this->conductRepository->create($conductDTO);
    }
}
