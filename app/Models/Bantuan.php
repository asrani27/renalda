<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama', 'kategori', 'tahun', 'nilai', 'sumber', 'deskripsi'])]
class Bantuan extends Model
{
    protected $table = 'bantuan';

    /**
     * Get the penerimas for the bantuan.
     */
    public function penerimas(): HasMany
    {
        return $this->hasMany(Penerima::class);
    }
}
