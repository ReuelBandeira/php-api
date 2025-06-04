<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EyeOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function submits(): HasMany
    {
        return $this->hasMany(Submit::class);
    }
}
