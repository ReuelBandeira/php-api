<?php
// CreateDoctorService.php
namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\DTOs\DoctorDTO;
use App\Modules\Doctor\Repositories\DoctorRepository;

class CreateDoctorService
{
    public function __construct(
        private DoctorRepository $repository
    ) {
    }

    public function execute(DoctorDTO $doctorDTO)
    {
        return $this->repository->create($doctorDTO);
    }
}