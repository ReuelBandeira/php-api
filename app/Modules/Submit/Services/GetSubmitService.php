<?php

namespace App\Modules\Submit\Services;

use App\Modules\Submit\Repositories\SubmitRepository;
use Illuminate\Database\Eloquent\Collection;

class GetSubmitService
{
    public function __construct(
        private SubmitRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {
        $submit = $this->repository->getById($id);
        
        if (!$submit) {
            return null;
        }
        
        return $submit;
    }
}