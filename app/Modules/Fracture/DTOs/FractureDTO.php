<?php

namespace App\Modules\Fracture\DTOs;

class FractureDTO
{
    public function __construct(
        public string $presence,
        public string $location,
        public string $type,
        public ?int $id = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            presence: $data['presence'],
            location: $data['location'],
            type: $data['type'],
            id: $data['id'] ?? null
        );
    }

    public function toArray(): array
    {
        $data = [
            'presence' => $this->presence,
            'location' => $this->location,
            'type' => $this->type,
        ];

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
} 