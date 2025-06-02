<?php
// UpdateEyeOpeningService.php
namespace App\Modules\EyeOpening\Services;

use App\Modules\EyeOpening\DTOs\EyeOpeningDTO;
use App\Modules\EyeOpening\Models\EyeOpening;
use App\Modules\EyeOpening\Repositories\EyeOpeningRepository;

class UpdateEyeOpeningService
{
    public function __construct(
        private EyeOpeningRepository $repository
    ) {
    }

    public function execute(EyeOpening $eyeOpening, EyeOpeningDTO $eyeOpeningDTO): bool
    {
        return $this->repository->update($eyeOpening, $eyeOpeningDTO);
    }
}
