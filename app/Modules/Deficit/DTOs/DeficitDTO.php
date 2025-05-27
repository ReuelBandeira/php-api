<?php

namespace App\Modules\Deficit\DTOs;

class DeficitDTO
{
    public function __construct(
        public ?int $id = null,
        public string $name = '',
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'] ?? '',
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
