<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['penerima_id', 'kriteria_id', 'skor'])]
class NilaiKriteria extends Model
{
    protected $table = 'nilai_kriteria';

    /**
     * Get the penerima that owns the nilai.
     */
    public function penerima(): BelongsTo
    {
        return $this->belongsTo(Penerima::class);
    }

    /**
     * Get the kriteria that owns the nilai.
     */
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class);
    }

    /**
     * Calculate the nilai (bobot * skor)
     */
    public function getNilaiAttribute()
    {
        return $this->kriteria->bobot * $this->skor;
    }
}