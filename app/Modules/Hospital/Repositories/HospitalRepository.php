<?php

namespace App\Modules\Hospital\Repositories;

use App\Modules\Hospital\DTOs\HospitalDTO;
use App\Models\Hospital;

class HospitalRepository
{
    public function getAll()
    {
        return Hospital::all()->map(function ($hospital) {
            return HospitalDTO::fromArray($hospital->toArray());
        });
    }

    public function findById(int $id)
    {
        $hospital = Hospital::findOrFail($id);
        return HospitalDTO::fromArray($hospital->toArray());
    }

    public function create(HospitalDTO $HospitalDTO)
    {
        $hospital = Hospital::create([
            'name' => $HospitalDTO->name,
        ]);

        return HospitalDTO::fromArray($hospital->toArray());
    }

    public function update(int $id, HospitalDTO $HospitalDTO)
    {
        $hospital = Hospital::findOrFail($id);

        $hospital->update([
            'name' => $HospitalDTO->name,
        ]);

        return HospitalDTO::fromArray($hospital->toArray());
    }

    public function delete(int $id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();

        return true;
    }
}
