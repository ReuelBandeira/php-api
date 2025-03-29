<?php
// UpdateDoctorService.php
namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\DTOs\DoctorDTO;
use App\Modules\Doctor\Repositories\DoctorRepository;

class UpdateDoctorService
{
    public function __construct(
        private DoctorRepository $repository
    ) {
    }

    public function execute(DoctorDTO $doctorDTO)
    {
        return $this->repository->update($doctorDTO);
    }
}