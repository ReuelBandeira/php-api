<?php

namespace App\Modules\Conduct\Services;

use App\Modules\Conduct\Repositories\ConductRepository;

class DeleteConductService
{
    public function __construct(
        private ConductRepository $conductRepository
    ) {
    }

    public function execute(int $id)
    {
        return $this->conductRepository->delete($id);
    }
}
