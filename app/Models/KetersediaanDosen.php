<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KetersediaanDosen extends Model
{
    use HasFactory;

    protected $table = 'ketersediaan_dosen';

    protected $fillable = [
        'user_id',
        'unavailable_slots',
    ];

    protected $casts = [
        'unavailable_slots' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}