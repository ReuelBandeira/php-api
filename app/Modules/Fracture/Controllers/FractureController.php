<?php

namespace App\Modules\Fracture\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Fracture\DTOs\FractureDTO;
use App\Modules\Fracture\Services\CreateFractureService;
use App\Modules\Fracture\Services\DeleteFractureService;
use App\Modules\Fracture\Services\GetFractureService;
use App\Modules\Fracture\Services\UpdateFractureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FractureController extends Controller
{
    public function __construct(
        private GetFractureService $getFractureService,
        private CreateFractureService $createFractureService,
        private UpdateFractureService $updateFractureService,
        private DeleteFractureService $deleteFractureService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fractures = $this->getFractureService->getAll();
        
        return response()->json(['data' => $fractures]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'presence' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $fractureDTO = FractureDTO::fromArray($request->all());
        $fracture = $this->createFractureService->execute($fractureDTO);
        
        return response()->json(['data' => $fracture], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fracture = $this->getFractureService->getById($id);

        if (!$fracture) {
            return response()->json(['message' => 'Fracture not found'], 404);
        }

        return response()->json(['data' => $fracture]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fracture = $this->getFractureService->getById($id);

        if (!$fracture) {
            return response()->json(['message' => 'Fracture not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'presence' => 'sometimes|string|max:255',
            'location' => 'sometimes|string|max:255',
            'type' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['id'] = $id;
        
        $fractureDTO = FractureDTO::fromArray($data);
        $fracture = $this->updateFractureService->execute($fractureDTO);
        
        return response()->json(['data' => $fracture]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fracture = $this->getFractureService->getById($id);

        if (!$fracture) {
            return response()->json(['message' => 'Fracture not found'], 404);
        }

        $result = $this->deleteFractureService->execute($id);
        
        if ($result) {
            return response()->json([], 204);
        }
        
        return response()->json(['message' => 'Failed to delete fracture'], 500);
    }
} 