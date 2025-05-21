<?php

namespace App\Modules\Submit\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Submit\DTOs\SubmitDTO;
use App\Modules\Submit\Services\CreateSubmitService;
use App\Modules\Submit\Services\DeleteSubmitService;
use App\Modules\Submit\Services\GetSubmitService;
use App\Modules\Submit\Services\UpdateSubmitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SubmitController extends Controller
{
    public function __construct(
        private GetSubmitService $getSubmitService,
        private CreateSubmitService $createSubmitService,
        private UpdateSubmitService $updateSubmitService,
        private DeleteSubmitService $deleteSubmitService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submits = $this->getSubmitService->getAll();
        
        return response()->json(['data' => $submits]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hospital_id' => 'required|exists:hospitals,id',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'trauma_id' => 'required|exists:traumas,id',
            'conscience' => 'required|string',
            'status' => 'required|string',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:jpeg,png,jpg,gif,pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $submitDTO = SubmitDTO::fromArray($request->except('attachments'));
        $attachments = $request->file('attachments') ?? [];
        
        $submit = $this->createSubmitService->execute($submitDTO, $attachments);
        
        return response()->json(['data' => $submit], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submit = $this->getSubmitService->getById($id);

        if (!$submit) {
            return response()->json(['message' => 'Submit not found'], 404);
        }

        return response()->json(['data' => $submit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $submit = $this->getSubmitService->getById($id);

        if (!$submit) {
            return response()->json(['message' => 'Submit not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'hospital_id' => 'sometimes|exists:hospitals,id',
            'doctor_id' => 'sometimes|exists:doctors,id',
            'patient_id' => 'sometimes|exists:patients,id',
            'trauma_id' => 'sometimes|exists:traumas,id',
            'conscience' => 'sometimes|string',
            'status' => 'sometimes|string',
            'attachments' => 'nullable|array',
            'attachments.*' => 'file|mimes:jpeg,png,jpg,gif,pdf|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('attachments');
        $data['id'] = $id;
        
        $submitDTO = SubmitDTO::fromArray($data);
        $attachments = $request->file('attachments') ?? [];
        
        $submit = $this->updateSubmitService->execute($submitDTO, $attachments);
        
        return response()->json(['data' => $submit]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $submit = $this->getSubmitService->getById($id);

        if (!$submit) {
            return response()->json(['message' => 'Submit not found'], 404);
        }

        $result = $this->deleteSubmitService->execute($id);
        
        if ($result) {
            return response()->json([], 204);
        }
        
        return response()->json(['message' => 'Failed to delete submit'], 500);
    }
    
    /**
     * Delete a specific attachment.
     */
    public function deleteAttachment(string $submitId, string $attachmentId)
    {
        $submit = $this->getSubmitService->getById($submitId);

        if (!$submit) {
            return response()->json(['message' => 'Submit not found'], 404);
        }
        
        // Check if the attachment belongs to this submit
        $attachmentExists = $submit->attachments->contains('id', $attachmentId);
        
        if (!$attachmentExists) {
            return response()->json(['message' => 'Attachment not found or does not belong to this submit'], 404);
        }
        
        $result = $this->updateSubmitService->deleteAttachment($attachmentId);
        
        if ($result) {
            return response()->json([], 204);
        }
        
        return response()->json(['message' => 'Failed to delete attachment'], 500);
    }
}