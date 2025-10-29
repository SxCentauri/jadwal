<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenugasanMengajar extends Model
{
    use HasFactory;

    protected $table = 'penugasan_mengajar';

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'sks',
        'kelas',
        'semester',
        'time_block',
    ];

    public function mataKuliah(): BelongsTo
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}

