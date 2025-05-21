<?php

namespace App\Modules\Submit\Services;

use App\Modules\Submit\Repositories\SubmitRepository;

class DeleteSubmitService
{
    public function __construct(
        private SubmitRepository $repository
    ) {
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}