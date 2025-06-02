<?php
// GetEyeOpeningService.php
namespace App\Modules\EyeOpening\Services;

use App\Modules\EyeOpening\Models\EyeOpening;
use App\Modules\EyeOpening\Repositories\EyeOpeningRepository;
use Illuminate\Database\Eloquent\Collection;

class GetEyeOpeningService
{
    public function __construct(
        private EyeOpeningRepository $repository
    ) {
    }

    public function execute(): Collection
    {
        return $this->repository->getAll();
    }

    public function find(int $id): ?EyeOpening
    {
        return $this->repository->findById($id);
    }
}
