<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama', 'tanggal', 'lokasi', 'pendamping_id'])]
class JadwalPenyaluran extends Model
{
    protected $table = 'jadwal_penyaluran';

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function pendamping()
    {
        return $this->belongsTo(Pendamping::class);
    }
}
