<?php

namespace App\Modules\VerbalResponse\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\VerbalResponse\DTOs\VerbalResponseDTO;
use App\Modules\VerbalResponse\Services\CreateVerbalResponseService;
use App\Modules\VerbalResponse\Services\DeleteVerbalResponseService;
use App\Modules\VerbalResponse\Services\GetVerbalResponseService;
use App\Modules\VerbalResponse\Services\UpdateVerbalResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerbalResponseController extends Controller
{
    public function __construct(
        private GetVerbalResponseService $getVerbalResponseService,
        private CreateVerbalResponseService $createVerbalResponseService,
        private UpdateVerbalResponseService $updateVerbalResponseService,
        private DeleteVerbalResponseService $deleteVerbalResponseService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $verbalResponses = $this->getVerbalResponseService->getAll();

        return response()->json(['data' => $verbalResponses]);
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

        $verbalResponseDTO = VerbalResponseDTO::fromArray($request->all());
        $verbalResponse = $this->createVerbalResponseService->execute($verbalResponseDTO);

        return response()->json(['data' => $verbalResponse], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $verbalResponse = $this->getVerbalResponseService->getById($id);

        if (!$verbalResponse) {
            return response()->json(['message' => 'Verbal Response not found'], 404);
        }

        return response()->json(['data' => $verbalResponse]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $verbalResponse = $this->getVerbalResponseService->getById($id);

        if (!$verbalResponse) {
            return response()->json(['message' => 'Verbal Response not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['id'] = $id;

        $verbalResponseDTO = VerbalResponseDTO::fromArray($data);
        $verbalResponse = $this->updateVerbalResponseService->execute($verbalResponseDTO);

        return response()->json(['data' => $verbalResponse]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $verbalResponse = $this->getVerbalResponseService->getById($id);

        if (!$verbalResponse) {
            return response()->json(['message' => 'Verbal Response not found'], 404);
        }

        $result = $this->deleteVerbalResponseService->execute($id);

        if ($result) {
            return response()->json([], 204);
        }

        return response()->json(['message' => 'Failed to delete verbal response'], 500);
    }
}
