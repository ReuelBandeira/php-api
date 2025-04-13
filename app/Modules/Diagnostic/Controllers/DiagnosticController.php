<?php

namespace App\Modules\Diagnostic\Controllers;

use App\Modules\Diagnostic\DTOs\DiagnosticDTO;
use App\Modules\Diagnostic\Services\CreateDiagnosticService;
use App\Modules\Diagnostic\Services\DeleteDiagnosticService;
use App\Modules\Diagnostic\Services\GetDiagnosticService;
use App\Modules\Diagnostic\Services\UpdateDiagnosticService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosticController extends Controller
{
    public function __construct(
        private GetDiagnosticService $getDiagnosticService,
        private CreateDiagnosticService $createDiagnosticService,
        private UpdateDiagnosticService $updateDiagnosticService,
        private DeleteDiagnosticService $deleteDiagnosticService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnostics = $this->getDiagnosticService->getAll();
        return response()->json($diagnostics);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $diagnosticDTO = DiagnosticDTO::fromArray($validated);
        $diagnostic = $this->createDiagnosticService->execute($diagnosticDTO);

        return response()->json($diagnostic, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diagnostic = $this->getDiagnosticService->getById((int) $id);
        return response()->json($diagnostic);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $diagnosticDTO = DiagnosticDTO::fromArray($validated);
        $diagnostic = $this->updateDiagnosticService->execute((int) $id, $diagnosticDTO);

        return response()->json($diagnostic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->deleteDiagnosticService->execute((int) $id);
        return response()->json(null, 204);
    }
}
