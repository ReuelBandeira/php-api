<?php

namespace App\Modules\Doctor\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Doctor\DTOs\DoctorDTO;
use App\Modules\Doctor\Services\CreateDoctorService;
use App\Modules\Doctor\Services\DeleteDoctorService;
use App\Modules\Doctor\Services\GetDoctorService;
use App\Modules\Doctor\Services\UpdateDoctorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function __construct(
        private GetDoctorService $getDoctorService,
        private CreateDoctorService $createDoctorService,
        private UpdateDoctorService $updateDoctorService,
        private DeleteDoctorService $deleteDoctorService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = $this->getDoctorService->getAll();
        
        return response()->json(['data' => $doctors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:8',
            'type' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $doctorDTO = DoctorDTO::fromArray($request->all());
        $doctor = $this->createDoctorService->execute($doctorDTO);
        
        return response()->json(['data' => $doctor], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = $this->getDoctorService->getById($id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        return response()->json(['data' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor = $this->getDoctorService->getById($id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:20',
            'email' => 'sometimes|string|email|max:255|unique:doctors,email,' . $id,
            'password' => 'sometimes|string|min:8',
            'type' => 'sometimes|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['id'] = $id;
        
        $doctorDTO = DoctorDTO::fromArray($data);
        $doctor = $this->updateDoctorService->execute($doctorDTO);
        
        return response()->json(['data' => $doctor]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = $this->getDoctorService->getById($id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $result = $this->deleteDoctorService->execute($id);
        
        if ($result) {
            return response()->json([], 204);
        }
        
        return response()->json(['message' => 'Failed to delete doctor'], 500);
    }
}