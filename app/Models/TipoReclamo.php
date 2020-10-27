<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoReclamo extends Model
{
    protected $table = 'tipos_reclamos';

    protected $fillable = [
        'descripcion'
   	];
}
