<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['penerima_id', 'pendamping_id', 'tanggal_monitoring', 'kondisi_usaha', 'perkembangan_usaha', 'foto_monitoring'])]
class Monitoring extends Model
{
    protected $table = 'monitoring';

    protected $casts = [
        'tanggal_monitoring' => 'date',
    ];

    /**
     * Get the penerima that owns the monitoring.
     */
    public function penerima(): BelongsTo
    {
        return $this->belongsTo(Penerima::class);
    }

    /**
     * Get the pendamping that owns the monitoring.
     */
    public function pendamping(): BelongsTo
    {
        return $this->belongsTo(Pendamping::class);
    }
}