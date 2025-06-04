<?php

namespace App\Modules\Pupil\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Pupil\DTOs\PupilDTO;
use App\Modules\Pupil\Services\CreatePupilService;
use App\Modules\Pupil\Services\DeletePupilService;
use App\Modules\Pupil\Services\GetPupilService;
use App\Modules\Pupil\Services\UpdatePupilService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PupilController extends Controller
{
    public function __construct(
        private GetPupilService $getPupilService,
        private CreatePupilService $createPupilService,
        private UpdatePupilService $updatePupilService,
        private DeletePupilService $deletePupilService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pupils = $this->getPupilService->getAll();
        
        return response()->json(['data' => $pupils]);
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

        $pupilDTO = PupilDTO::fromArray($request->all());
        $pupil = $this->createPupilService->execute($pupilDTO);
        
        return response()->json(['data' => $pupil], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pupil = $this->getPupilService->getById($id);

        if (!$pupil) {
            return response()->json(['message' => 'Pupil not found'], 404);
        }

        return response()->json(['data' => $pupil]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pupil = $this->getPupilService->getById($id);

        if (!$pupil) {
            return response()->json(['message' => 'Pupil not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['id'] = $id;
        
        $pupilDTO = PupilDTO::fromArray($data);
        $pupil = $this->updatePupilService->execute($pupilDTO);
        
        return response()->json(['data' => $pupil]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pupil = $this->getPupilService->getById($id);

        if (!$pupil) {
            return response()->json(['message' => 'Pupil not found'], 404);
        }

        $result = $this->deletePupilService->execute($id);
        
        if ($result) {
            return response()->json([], 204);
        }
        
        return response()->json(['message' => 'Failed to delete pupil'], 500);
    }
} 