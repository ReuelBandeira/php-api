<?php

namespace App\Modules\Submit\DTOs;

class SubmitDTO
{
    public function __construct(
        public int $hospital_id,
        public int $doctor_id,
        public int $patient_id,
        public int $trauma_id,
        public ?int $deficit_id = null,
        public ?int $eye_opening_id = null,
        public ?int $verbal_response_id = null,
        public ?int $motor_response_id = null,
        public ?int $pupil_id = null,
        public ?int $fracture_id = null,
        public ?array $attachments = null,
        public string $status,
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
            deficit_id: isset($data['deficit_id']) ? (int) $data['deficit_id'] : null,
            eye_opening_id: isset($data['eye_opening_id']) ? (int) $data['eye_opening_id'] : null,
            verbal_response_id: isset($data['verbal_response_id']) ? (int) $data['verbal_response_id'] : null,
            motor_response_id: isset($data['motor_response_id']) ? (int) $data['motor_response_id'] : null,
            pupil_id: isset($data['pupil_id']) ? (int) $data['pupil_id'] : null,
            fracture_id: isset($data['fracture_id']) ? (int) $data['fracture_id'] : null,
            attachments: $data['attachments'] ?? null,
            status: $data['status'],
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
            'status' => $this->status,
        ];

        if ($this->deficit_id !== null) {
            $data['deficit_id'] = $this->deficit_id;
        }

        if ($this->eye_opening_id !== null) {
            $data['eye_opening_id'] = $this->eye_opening_id;
        }

        if ($this->verbal_response_id !== null) {
            $data['verbal_response_id'] = $this->verbal_response_id;
        }

        if ($this->motor_response_id !== null) {
            $data['motor_response_id'] = $this->motor_response_id;
        }

        if ($this->pupil_id !== null) {
            $data['pupil_id'] = $this->pupil_id;
        }

        if ($this->fracture_id !== null) {
            $data['fracture_id'] = $this->fracture_id;
        }

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}
