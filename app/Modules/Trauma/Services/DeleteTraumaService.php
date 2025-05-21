<?php

namespace App\Modules\Trauma\Services;

use App\Modules\Trauma\Repositories\TraumaRepository;

class DeleteTraumaService
{
    public function __construct(
        private TraumaRepository $TraumaRepository
    ) {
    }

    public function execute(int $id)
    {
        return $this->TraumaRepository->delete($id);
    }
}
