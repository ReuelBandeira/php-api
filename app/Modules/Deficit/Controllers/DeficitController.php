<?php

namespace App\Modules\Deficit\Controllers;

use App\Modules\Deficit\DTOs\DeficitDTO;
use App\Modules\Deficit\Services\CreateDeficitService;
use App\Modules\Deficit\Services\DeleteDeficitService;
use App\Modules\Deficit\Services\GetDeficitService;
use App\Modules\Deficit\Services\UpdateDeficitService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeficitController extends Controller
{
    public function __construct(
        private GetDeficitService $getDeficitService,
        private CreateDeficitService $createDeficitService,
        private UpdateDeficitService $updateDeficitService,
        private DeleteDeficitService $deleteDeficitService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deficits = $this->getDeficitService->getAll();
        return response()->json($deficits);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $deficitDTO = DeficitDTO::fromArray($validated);
        $deficit = $this->createDeficitService->execute($deficitDTO);

        return response()->json($deficit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $deficit = $this->getDeficitService->getById((int) $id);
        return response()->json($deficit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $deficitDTO = DeficitDTO::fromArray($validated);
        $deficit = $this->updateDeficitService->execute((int) $id, $deficitDTO);

        return response()->json($deficit);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deleteDeficitService->execute((int) $id);
        return response()->json(null, 204);
    }
}
