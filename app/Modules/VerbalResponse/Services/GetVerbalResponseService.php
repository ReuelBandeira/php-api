<?php

namespace App\Modules\VerbalResponse\Services;

use App\Models\VerbalResponse;
use App\Modules\VerbalResponse\Repositories\VerbalResponseRepository;
use Illuminate\Database\Eloquent\Collection;

class GetVerbalResponseService
{
    public function __construct(
        private VerbalResponseRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id): ?VerbalResponse
    {
        return $this->repository->getById($id);
    }
}
