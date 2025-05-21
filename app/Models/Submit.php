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
        'conscience',
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

    public function attachments(): HasMany
    {
        return $this->hasMany(SubmitAttachment::class);
    }
}
