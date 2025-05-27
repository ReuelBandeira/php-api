<?php

namespace App\Modules\Conduct\Controllers;

use App\Modules\Conduct\DTOs\ConductDTO;
use App\Modules\Conduct\Services\CreateConductService;
use App\Modules\Conduct\Services\DeleteConductService;
use App\Modules\Conduct\Services\GetConductService;
use App\Modules\Conduct\Services\UpdateConductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConductController extends Controller
{
    public function __construct(
        private GetConductService $getConductService,
        private CreateConductService $createConductService,
        private UpdateConductService $updateConductService,
        private DeleteConductService $deleteConductService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conducts = $this->getConductService->getAll();
        return response()->json($conducts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $conductDTO = ConductDTO::fromArray($validated);
        $conduct = $this->createConductService->execute($conductDTO);

        return response()->json($conduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conduct = $this->getConductService->getById((int) $id);
        return response()->json(['data' =>$conduct]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $conductDTO = ConductDTO::fromArray($validated);
        $conduct = $this->updateConductService->execute((int) $id, $conductDTO);

        return response()->json($conduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deleteConductService->execute((int) $id);
        return response()->json(null, 204);
    }
}
