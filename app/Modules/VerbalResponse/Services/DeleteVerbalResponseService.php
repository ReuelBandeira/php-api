<?php

namespace App\Modules\VerbalResponse\Services;

use App\Modules\VerbalResponse\Repositories\VerbalResponseRepository;

class DeleteVerbalResponseService
{
    public function __construct(
        private VerbalResponseRepository $repository
    ) {
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
