<?php

namespace App\Modules\Pupil\Services;

use App\Modules\Pupil\DTOs\PupilDTO;
use App\Modules\Pupil\Repositories\PupilRepository;

class UpdatePupilService
{
    public function __construct(
        private PupilRepository $repository
    ) {
    }

    public function execute(PupilDTO $pupilDTO)
    {
        return $this->repository->update($pupilDTO);
    }
} 