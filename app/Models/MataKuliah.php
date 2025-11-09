<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\PenugasanMengajar;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mata_kuliah',
    ];

    public $timestamps = false;

    public function penugasanMengajar(): HasMany
    {
        return $this->hasMany(PenugasanMengajar::class, 'mata_kuliah_id');
    }
}

