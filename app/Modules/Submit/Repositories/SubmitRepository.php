<?php

namespace App\Modules\Submit\Repositories;

use App\Models\Submit;
use App\Models\SubmitAttachment;
use App\Modules\Submit\DTOs\AttachmentDTO;
use App\Modules\Submit\DTOs\SubmitDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SubmitRepository
{
    public function __construct(
        private Submit $model,
        private SubmitAttachment $attachmentModel
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->with([
            'attachments',
            'hospital',
            'doctor',
            'patient',
            'trauma',
            'deficit',
            'eyeOpening',
            'verbalResponse',
            'motorResponse',
            'pupil',
            'fracture'
        ])->get();
    }

    public function getById(int $id): ?Submit
    {
        return $this->model->with([
            'attachments',
            'hospital',
            'doctor',
            'patient',
            'trauma',
            'deficit',
            'eyeOpening',
            'verbalResponse',
            'motorResponse',
            'pupil',
            'fracture'
        ])->find($id);
    }

    public function create(SubmitDTO $submitDTO): Submit
    {
        $submit = $this->model->create($submitDTO->toArray());

        return $submit;
    }

    public function storeAttachments(int $submitId, array $files): array
    {
        $attachments = [];

        foreach ($files as $file) {
            /** @var UploadedFile $file */
            $path = $this->storeFile($file, $submitId);

            $attachment = $this->attachmentModel->create([
                'submit_id' => $submitId,
                'file_path' => $path,
                'original_filename' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
            ]);

            $attachments[] = $attachment;
        }

        return $attachments;
    }

    private function storeFile(UploadedFile $file, int $submitId): string
    {
        $directory = "attachments/submit_{$submitId}";
        $filename = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($directory, $filename, 'public');

        return $path;
    }

    public function update(SubmitDTO $submitDTO): ?Submit
    {
        $submit = $this->getById($submitDTO->id);

        if (!$submit) {
            return null;
        }

        $submit->update($submitDTO->toArray());

        return $submit;
    }

    public function delete(int $id): bool
    {
        $submit = $this->getById($id);

        if (!$submit) {
            return false;
        }

        // Delete associated attachment files from storage
        foreach ($submit->attachments as $attachment) {
            Storage::disk('public')->delete($attachment->file_path);
        }

        return $submit->delete();
    }

    public function deleteAttachment(int $attachmentId): bool
    {
        $attachment = $this->attachmentModel->find($attachmentId);

        if (!$attachment) {
            return false;
        }

        // Delete file from storage
        Storage::disk('public')->delete($attachment->file_path);

        return $attachment->delete();
    }
}
