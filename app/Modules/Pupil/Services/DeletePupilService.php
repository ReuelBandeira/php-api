<?php

namespace App\Modules\Pupil\Services;

use App\Modules\Pupil\Repositories\PupilRepository;

class DeletePupilService
{
    public function __construct(
        private PupilRepository $repository
    ) {
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
} 