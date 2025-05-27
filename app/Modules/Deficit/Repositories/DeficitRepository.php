<?php

namespace App\Modules\Deficit\Repositories;

use App\Modules\Deficit\DTOs\DeficitDTO;
use App\Models\Deficit;

class DeficitRepository
{
    public function getAll()
    {
        return Deficit::all()->map(function ($deficit) {
            return DeficitDTO::fromArray($deficit->toArray());
        });
    }

    public function findById(int $id)
    {
        $deficit = Deficit::findOrFail($id);
        return DeficitDTO::fromArray($deficit->toArray());
    }

    public function create(DeficitDTO $deficitDTO)
    {
        $deficit = Deficit::create([
            'name' => $deficitDTO->name,
        ]);

        return DeficitDTO::fromArray($deficit->toArray());
    }

    public function update(int $id, DeficitDTO $deficitDTO)
    {
        $deficit = Deficit::findOrFail($id);

        $deficit->update([
            'name' => $deficitDTO->name,
        ]);

        return DeficitDTO::fromArray($deficit->toArray());
    }

    public function delete(int $id)
    {
        $deficit = Deficit::findOrFail($id);
        $deficit->delete();

        return true;
    }
}
