<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama', 'bobot'])]
class Kriteria extends Model
{
    protected $table = 'kriteria';
}