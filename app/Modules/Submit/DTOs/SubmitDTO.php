<?php

namespace App\Modules\Submit\DTOs;

class SubmitDTO
{
    public function __construct(
        public int $hospital_id,
        public int $doctor_id,
        public int $patient_id,
        public int $trauma_id,
        public string $conscience,
        public string $status,
        public ?array $attachments = null,
        public ?int $id = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            hospital_id: (int) $data['hospital_id'],
            doctor_id: (int) $data['doctor_id'],
            patient_id: (int) $data['patient_id'],
            trauma_id: (int) $data['trauma_id'],
            conscience: $data['conscience'],
            status: $data['status'],
            attachments: $data['attachments'] ?? null,
            id: $data['id'] ?? null
        );
    }

    public function toArray(): array
    {
        $data = [
            'hospital_id' => $this->hospital_id,
            'doctor_id' => $this->doctor_id,
            'patient_id' => $this->patient_id,
            'trauma_id' => $this->trauma_id,
            'conscience' => $this->conscience,
            'status' => $this->status,
        ];

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}