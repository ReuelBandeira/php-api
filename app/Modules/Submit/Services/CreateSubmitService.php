<?php

namespace App\Modules\Submit\Services;

use App\Modules\Submit\DTOs\SubmitDTO;
use App\Modules\Submit\Repositories\SubmitRepository;
use Illuminate\Http\UploadedFile;

class CreateSubmitService
{
    public function __construct(
        private SubmitRepository $repository
    ) {
    }

    public function execute(SubmitDTO $submitDTO, array $attachments = [])
    {
        $submit = $this->repository->create($submitDTO);
        
        if (!empty($attachments)) {
            $this->repository->storeAttachments($submit->id, $attachments);
        }
        
        return $this->repository->getById($submit->id);
    }
}