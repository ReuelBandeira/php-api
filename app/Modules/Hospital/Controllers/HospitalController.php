<?php

namespace App\Modules\Hospital\Controllers;

use App\Modules\Hospital\DTOs\HospitalDTO;
use App\Modules\Hospital\Services\CreateHospitalService;
use App\Modules\Hospital\Services\DeleteHospitalService;
use App\Modules\Hospital\Services\GetHospitalService;
use App\Modules\Hospital\Services\UpdateHospitalService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function __construct(
        private GetHospitalService $getHospitalService,
        private CreateHospitalService $createHospitalService,
        private UpdateHospitalService $updateHospitalService,
        private DeleteHospitalService $deleteHospitalService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = $this->getHospitalService->getAll();
        return response()->json($hospitals);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $HospitalDTO = HospitalDTO::fromArray($validated);
        $hospital = $this->createHospitalService->execute($HospitalDTO);

        return response()->json($hospital, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hospital = $this->getHospitalService->getById((int) $id);
        return response()->json($hospital);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $HospitalDTO = HospitalDTO::fromArray($validated);
        $hospital = $this->updateHospitalService->execute((int) $id, $HospitalDTO);

        return response()->json($hospital);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deleteHospitalService->execute((int) $id);
        return response()->json(null, 204);
    }
}
