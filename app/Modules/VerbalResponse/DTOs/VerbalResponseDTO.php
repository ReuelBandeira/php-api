<?php

namespace App\Modules\VerbalResponse\DTOs;

class VerbalResponseDTO
{
    public function __construct(
        public string $name,
        public ?int $id = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            id: $data['id'] ?? null
        );
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
        ];

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}
