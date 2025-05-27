<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Doctor\Controllers\DoctorController;
use App\Modules\Patient\Controllers\PatientController;
use App\Modules\Diagnostic\Controllers\DiagnosticController;
use App\Modules\Conduct\Controllers\ConductController;
use App\Modules\Trauma\Controllers\TraumaController;
use App\Modules\Hospital\Controllers\HospitalController;
use App\Modules\Submit\Controllers\SubmitController;
use App\Modules\Deficit\Controllers\DeficitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Doctor Routes
Route::apiResource('doctors', DoctorController::class);
// Patient Routes
Route::apiResource('patients', PatientController::class);

Route::apiResource('diagnostics', DiagnosticController::class);

Route::apiResource('conducts', ConductController::class);

Route::apiResource('traumas', TraumaController::class);

Route::apiResource('hospitals', HospitalController::class);

Route::apiResource('submits', \App\Modules\Submit\Controllers\SubmitController::class);

Route::delete('submits/{submit}/attachments/{attachment}', [\App\Modules\Submit\Controllers\SubmitController::class, 'deleteAttachment']);

// Deficit Routes
Route::apiResource('deficits', DeficitController::class);
