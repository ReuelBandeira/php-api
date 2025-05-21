<?php

namespace App\Modules\Submit\Services;

use App\Modules\Submit\DTOs\SubmitDTO;
use App\Modules\Submit\Repositories\SubmitRepository;

class UpdateSubmitService
{
    public function __construct(
        private SubmitRepository $repository
    ) {
    }

    public function execute(SubmitDTO $submitDTO, array $attachments = [])
    {
        $submit = $this->repository->update($submitDTO);
        
        if (!$submit) {
            return null;
        }
        
        if (!empty($attachments)) {
            $this->repository->storeAttachments($submit->id, $attachments);
        }
        
        return $this->repository->getById($submit->id);
    }
    
    public function deleteAttachment(int $attachmentId): bool
    {
        return $this->repository->deleteAttachment($attachmentId);
    }
}