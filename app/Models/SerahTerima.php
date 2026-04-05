<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SerahTerima extends Model
{
    protected $table = 'serah_terima';
    protected $fillable = [
        'penerima_id',
        'pendamping_id',
        'nomor_bast',
        'tanggal_bast',
        'foto_bast',
    ];

    protected $casts = [
        'tanggal_bast' => 'date',
    ];

    /**
     * Get the penerima that owns the serah terima.
     */
    public function penerima(): BelongsTo
    {
        return $this->belongsTo(Penerima::class);
    }

    /**
     * Get the pendamping that owns the serah terima.
     */
    public function pendamping(): BelongsTo
    {
        return $this->belongsTo(Pendamping::class);
    }
}