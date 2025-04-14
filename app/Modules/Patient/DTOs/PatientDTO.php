<?php

namespace App\Modules\Patient\DTOs;

class PatientDTO
{
    public function __construct(
        public string $name,
        public int $age,
        public ?int $id = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            age: (int) $data['age'],
            id: $data['id'] ?? null
        );
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'age' => $this->age,
        ];

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}