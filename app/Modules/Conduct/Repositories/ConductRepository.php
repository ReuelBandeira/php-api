<?php

namespace App\Modules\Conduct\Repositories;

use App\Modules\Conduct\DTOs\ConductDTO;
use App\Models\Conduct;

class ConductRepository
{
    public function getAll()
    {
        return Conduct::all()->map(function ($conduct) {
            return ConductDTO::fromArray($conduct->toArray());
        });
    }

    public function findById(int $id)
    {
        $conduct = Conduct::findOrFail($id);
        return ConductDTO::fromArray($conduct->toArray());
    }

    public function create(ConductDTO $conductDTO)
    {
        $conduct = Conduct::create([
            'name' => $conductDTO->name,
        ]);

        return ConductDTO::fromArray($conduct->toArray());
    }

    public function update(int $id, ConductDTO $conductDTO)
    {
        $conduct = Conduct::findOrFail($id);

        $conduct->update([
            'name' => $conductDTO->name,
        ]);

        return ConductDTO::fromArray($conduct->toArray());
    }

    public function delete(int $id)
    {
        $conduct = Conduct::findOrFail($id);
        $conduct->delete();

        return true;
    }
}
