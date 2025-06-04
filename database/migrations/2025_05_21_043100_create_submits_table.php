<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id')->constrained('hospitals');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('trauma_id')->constrained('traumas');
            $table->foreignId('deficit_id')->nullable()->constrained('deficits');
            $table->foreignId('eye_opening_id')->nullable()->constrained('eye_openings');
            $table->foreignId('verbal_response_id')->nullable()->constrained('verbal_responses');
            $table->foreignId('motor_response_id')->nullable()->constrained('motor_responses');
            $table->foreignId('pupil_id')->nullable()->constrained('pupils');
            $table->foreignId('fracture_id')->nullable()->constrained('fractures');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submits');
    }
};
