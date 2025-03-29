<?php
// DeleteDoctorService.php
namespace App\Modules\Doctor\Services;

use App\Modules\Doctor\Repositories\DoctorRepository;

class DeleteDoctorService
{
    public function __construct(
        private DoctorRepository $repository
    ) {
    }

    public function execute(int $id): bool
    {
        return $this->repository->delete($id);
    }
}