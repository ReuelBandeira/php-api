<?php
// DeleteEyeOpeningService.php
namespace App\Modules\EyeOpening\Services;

use App\Modules\EyeOpening\Models\EyeOpening;
use App\Modules\EyeOpening\Repositories\EyeOpeningRepository;

class DeleteEyeOpeningService
{
    public function __construct(
        private EyeOpeningRepository $repository
    ) {
    }

    public function execute(EyeOpening $eyeOpening): bool
    {
        return $this->repository->delete($eyeOpening);
    }
}
