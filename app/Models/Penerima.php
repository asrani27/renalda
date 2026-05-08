<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penerima extends Model
{
    protected $table = 'penerima';
    protected $fillable = [
        'calon_penerima_id',
        'bantuan_id',
        'status_penerima',
        'tanggal_penyaluran',
        'catatan',
    ];

    protected $casts = [
        'tanggal_penyaluran' => 'date',
    ];

    /**
     * Get the calon penerima that owns the penerima.
     */
    public function calonPenerima(): BelongsTo
    {
        return $this->belongsTo(CalonPenerima::class);
    }

    /**
     * Get the bantuan that owns the penerima.
     */
    public function bantuan(): BelongsTo
    {
        return $this->belongsTo(Bantuan::class);
    }

    /**
     * Get the penyaluran bantuan for the penerima.
     */
    public function penyaluranBantuan(): HasMany
    {
        return $this->hasMany(PenyaluranBantuan::class, 'penerima_id');
    }

    /**
     * Get the nilai kriteria for the penerima.
     */
    public function nilaiKriteria(): HasMany
    {
        return $this->hasMany(NilaiKriteria::class, 'penerima_id');
    }
}
