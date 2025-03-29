<?php

namespace App\Modules\Patient\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Patient\DTOs\PatientDTO;
use App\Modules\Patient\Services\CreatePatientService;
use App\Modules\Patient\Services\DeletePatientService;
use App\Modules\Patient\Services\GetPatientService;
use App\Modules\Patient\Services\UpdatePatientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function __construct(
        private GetPatientService $getPatientService,
        private CreatePatientService $createPatientService,
        private UpdatePatientService $updatePatientService,
        private DeletePatientService $deletePatientService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = $this->getPatientService->getAll();
        
        return response()->json(['data' => $patients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:150',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $patientDTO = PatientDTO::fromArray($request->all());
        $patient = $this->createPatientService->execute($patientDTO);
        
        return response()->json(['data' => $patient], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = $this->getPatientService->getById($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        return response()->json(['data' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = $this->getPatientService->getById($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'age' => 'sometimes|integer|min:0|max:150',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['id'] = $id;
        
        $patientDTO = PatientDTO::fromArray($data);
        $patient = $this->updatePatientService->execute($patientDTO);
        
        return response()->json(['data' => $patient]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = $this->getPatientService->getById($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $result = $this->deletePatientService->execute($id);
        
        if ($result) {
            return response()->json([], 204);
        }
        
        return response()->json(['message' => 'Failed to delete patient'], 500);
    }
}