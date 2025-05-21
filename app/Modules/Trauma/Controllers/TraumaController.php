<?php

namespace App\Modules\Trauma\Controllers;

use App\Modules\Trauma\DTOs\TraumaDTO;
use App\Modules\Trauma\Services\CreateTraumaService;
use App\Modules\Trauma\Services\DeleteTraumaService;
use App\Modules\Trauma\Services\GetTraumaService;
use App\Modules\Trauma\Services\UpdateTraumaService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TraumaController extends Controller
{
    public function __construct(
        private GetTraumaService $getTraumaService,
        private CreateTraumaService $createTraumaService,
        private UpdateTraumaService $updateTraumaService,
        private DeleteTraumaService $deleteTraumaService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $traumas = $this->getTraumaService->getAll();
        return response()->json($traumas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $TraumaDTO = TraumaDTO::fromArray($validated);
        $trauma = $this->createTraumaService->execute($TraumaDTO);

        return response()->json($trauma, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trauma = $this->getTraumaService->getById((int) $id);
        return response()->json($trauma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $TraumaDTO = TraumaDTO::fromArray($validated);
        $trauma = $this->updateTraumaService->execute((int) $id, $TraumaDTO);

        return response()->json($trauma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deleteTraumaService->execute((int) $id);
        return response()->json(null, 204);
    }
}
