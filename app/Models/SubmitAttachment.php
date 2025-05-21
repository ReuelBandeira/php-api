<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmitAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'submit_id',
        'file_path',
        'original_filename',
        'mime_type',
        'file_size',
    ];

    public function submit(): BelongsTo
    {
        return $this->belongsTo(Submit::class);
    }
}
