<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Submit extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'doctor_id',
        'patient_id',
        'trauma_id',
        'deficit_id',
        'eye_opening_id',
        'verbal_response_id',
        'motor_response_id',
        'pupil_id',
        'fracture_id',
        'status',
    ];

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function trauma(): BelongsTo
    {
        return $this->belongsTo(Trauma::class);
    }

    public function deficit(): BelongsTo
    {
        return $this->belongsTo(Deficit::class);
    }

    public function eyeOpening(): BelongsTo
    {
        return $this->belongsTo(EyeOpening::class);
    }

    public function verbalResponse(): BelongsTo
    {
        return $this->belongsTo(VerbalResponse::class);
    }

    public function motorResponse(): BelongsTo
    {
        return $this->belongsTo(MotorResponse::class);
    }

    public function pupil(): BelongsTo
    {
        return $this->belongsTo(Pupil::class);
    }

    public function fracture(): BelongsTo
    {
        return $this->belongsTo(Fracture::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(SubmitAttachment::class);
    }
}
