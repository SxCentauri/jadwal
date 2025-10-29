<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mata_kuliah',
    ];

    public $timestamps = false;

    public function teachingAssignments(): HasMany
    {
        return $this->hasMany(TeachingAssignment::class, 'mata_kuliah_id');
    }
}

