<?php

namespace App\Modules\Trauma\Repositories;

use App\Modules\Trauma\DTOs\TraumaDTO;
use App\Models\Trauma;

class TraumaRepository
{
    public function getAll()
    {
        return Trauma::all()->map(function ($trauma) {
            return TraumaDTO::fromArray($trauma->toArray());
        });
    }

    public function findById(int $id)
    {
        $trauma = Trauma::findOrFail($id);
        return TraumaDTO::fromArray($trauma->toArray());
    }

    public function create(TraumaDTO $TraumaDTO)
    {
        $trauma = Trauma::create([
            'name' => $TraumaDTO->name,
        ]);

        return TraumaDTO::fromArray($trauma->toArray());
    }

    public function update(int $id, TraumaDTO $TraumaDTO)
    {
        $trauma = Trauma::findOrFail($id);

        $trauma->update([
            'name' => $TraumaDTO->name,
        ]);

        return TraumaDTO::fromArray($trauma->toArray());
    }

    public function delete(int $id)
    {
        $trauma = Trauma::findOrFail($id);
        $trauma->delete();

        return true;
    }
}
