<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CalonPenerima extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'calon_penerima';
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'usaha',
        'telp',
        'pendamping_id',
        'dokumen_ktp',
        'dokumen_kk',
        'dokumen_foto_usaha',
        'dokumen_sktm',
        'dokumen_proposal',
        'status_verif',
        'tanggal_verif',
    ];

    protected $casts = [
        'tanggal_verif' => 'date',
    ];

    public function pendamping()
    {
        return $this->belongsTo(Pendamping::class);
    }

    public function penerimas()
    {
        return $this->hasMany(Penerima::class);
    }
}
