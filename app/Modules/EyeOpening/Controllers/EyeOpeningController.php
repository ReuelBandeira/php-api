<?php

namespace App\Modules\EyeOpening\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\EyeOpening\Models\EyeOpening;
use App\Modules\EyeOpening\Services\CreateEyeOpeningService;
use App\Modules\EyeOpening\Services\DeleteEyeOpeningService;
use App\Modules\EyeOpening\Services\GetEyeOpeningService;
use App\Modules\EyeOpening\Services\UpdateEyeOpeningService;
use App\Modules\EyeOpening\DTOs\EyeOpeningDTO;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EyeOpeningController extends Controller
{
    public function __construct(
        private readonly CreateEyeOpeningService $createService,
        private readonly GetEyeOpeningService $getService,
        private readonly UpdateEyeOpeningService $updateService,
        private readonly DeleteEyeOpeningService $deleteService
    ) {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->getService->execute());
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $dto = EyeOpeningDTO::fromArray($request->all());
        $eyeOpening = $this->createService->execute($dto);
        return response()->json($eyeOpening, 201);
    }

    public function show(EyeOpening $eyeOpening): JsonResponse
    {
        return response()->json($eyeOpening);
    }

    public function update(Request $request, EyeOpening $eyeOpening): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $dto = EyeOpeningDTO::fromArray($request->all());
        $this->updateService->execute($eyeOpening, $dto);
        return response()->json($eyeOpening);
    }

    public function destroy(EyeOpening $eyeOpening): JsonResponse
    {
        $this->deleteService->execute($eyeOpening);
        return response()->json(null, 204);
    }
}
