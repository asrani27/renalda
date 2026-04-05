<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama', 'telp', 'kecamatan', 'jabatan', 'unitkerja', 'user_id'])]
class Pendamping extends Model
{
    protected $table = 'pendamping';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
