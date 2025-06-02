<?php
// CreateEyeOpeningService.php
namespace App\Modules\EyeOpening\Services;

use App\Modules\EyeOpening\DTOs\EyeOpeningDTO;
use App\Modules\EyeOpening\Repositories\EyeOpeningRepository;
use App\Modules\EyeOpening\Models\EyeOpening;

class CreateEyeOpeningService
{
    public function __construct(
        private EyeOpeningRepository $repository
    ) {
    }

    public function execute(EyeOpeningDTO $eyeOpeningDTO): EyeOpening
    {
        return $this->repository->create($eyeOpeningDTO);
    }
}
