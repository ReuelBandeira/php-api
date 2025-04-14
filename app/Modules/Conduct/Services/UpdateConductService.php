<?php

namespace App\Modules\Conduct\Services;

use App\Modules\Conduct\DTOs\ConductDTO;
use App\Modules\Conduct\Repositories\ConductRepository;

class UpdateConductService
{
    public function __construct(
        private ConductRepository $conductRepository
    ) {
    }

    public function execute(int $id, ConductDTO $conductDTO)
    {
        return $this->conductRepository->update($id, $conductDTO);
    }
}
