<?php

namespace App\Modules\Submit\DTOs;

class AttachmentDTO
{
    public function __construct(
        public int $submit_id,
        public string $file_path,
        public string $original_filename,
        public string $mime_type,
        public int $file_size,
        public ?int $id = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            submit_id: (int) $data['submit_id'],
            file_path: $data['file_path'],
            original_filename: $data['original_filename'],
            mime_type: $data['mime_type'],
            file_size: (int) $data['file_size'],
            id: $data['id'] ?? null
        );
    }

    public function toArray(): array
    {
        $data = [
            'submit_id' => $this->submit_id,
            'file_path' => $this->file_path,
            'original_filename' => $this->original_filename,
            'mime_type' => $this->mime_type,
            'file_size' => $this->file_size,
        ];

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}