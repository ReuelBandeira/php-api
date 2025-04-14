<?php
// GetDoctorService.php
namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\DTOs\DoctorDTO;
use App\Modules\Doctor\Repositories\DoctorRepository;
use Illuminate\Database\Eloquent\Collection;

class GetDoctorService
{
    public function __construct(
        private DoctorRepository $repository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function getById(int $id)
    {
        $doctor = $this->repository->getById($id);
        
        if (!$doctor) {
            return null;
        }
        
        return $doctor;
    }
}