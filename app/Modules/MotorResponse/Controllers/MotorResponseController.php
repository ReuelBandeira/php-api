<?php

namespace App\Modules\MotorResponse\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\MotorResponse\DTOs\MotorResponseDTO;
use App\Modules\MotorResponse\Services\CreateMotorResponseService;
use App\Modules\MotorResponse\Services\DeleteMotorResponseService;
use App\Modules\MotorResponse\Services\GetMotorResponseService;
use App\Modules\MotorResponse\Services\UpdateMotorResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotorResponseController extends Controller
{
    public function __construct(
        private GetMotorResponseService $getMotorResponseService,
        private CreateMotorResponseService $createMotorResponseService,
        private UpdateMotorResponseService $updateMotorResponseService,
        private DeleteMotorResponseService $deleteMotorResponseService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motorResponses = $this->getMotorResponseService->getAll();

        return response()->json(['data' => $motorResponses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $motorResponseDTO = MotorResponseDTO::fromArray($request->all());
        $motorResponse = $this->createMotorResponseService->execute($motorResponseDTO);

        return response()->json(['data' => $motorResponse], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $motorResponse = $this->getMotorResponseService->getById($id);

        if (!$motorResponse) {
            return response()->json(['message' => 'Motor Response not found'], 404);
        }

        return response()->json(['data' => $motorResponse]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motorResponse = $this->getMotorResponseService->getById($id);

        if (!$motorResponse) {
            return response()->json(['message' => 'Motor Response not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['id'] = $id;

        $motorResponseDTO = MotorResponseDTO::fromArray($data);
        $motorResponse = $this->updateMotorResponseService->execute($motorResponseDTO);

        return response()->json(['data' => $motorResponse]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $motorResponse = $this->getMotorResponseService->getById($id);

        if (!$motorResponse) {
            return response()->json(['message' => 'Motor Response not found'], 404);
        }

        $result = $this->deleteMotorResponseService->execute($id);

        if ($result) {
            return response()->json([], 204);
        }

        return response()->json(['message' => 'Failed to delete motor response'], 500);
    }
}
