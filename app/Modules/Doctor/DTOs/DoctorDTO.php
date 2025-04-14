<?php

namespace App\Modules\Doctor\DTOs;

class DoctorDTO
{
    public function __construct(
        public string $name,
        public string $phone,
        public string $email,
        public ?string $password = null,
        public string $type,
        public ?int $id = null
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            phone: $data['phone'],
            email: $data['email'],
            password: $data['password'] ?? null,
            type: $data['type'],
            id: $data['id'] ?? null
        );
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'type' => $this->type,
        ];

        if ($this->password) {
            $data['password'] = $this->password;
        }

        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
    }
}