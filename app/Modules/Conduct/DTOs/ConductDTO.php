<?php

namespace App\Modules\Conduct\DTOs;

class ConductDTO
{
    public function __construct(
        public readonly ?int $id = null,
        public readonly string $name,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            name: $data['name'],
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
