<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['tanggal', 'jadwal_penyaluran_id', 'penerima_id', 'status'])]
class PenyaluranBantuan extends Model
{
    protected $table = 'penyaluran_bantuan';

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the jadwal penyaluran that owns the penyaluran bantuan.
     */
    public function jadwalPenyaluran(): BelongsTo
    {
        return $this->belongsTo(JadwalPenyaluran::class);
    }

    /**
     * Get the penerima that owns the penyaluran bantuan.
     */
    public function penerima(): BelongsTo
    {
        return $this->belongsTo(Penerima::class);
    }
}