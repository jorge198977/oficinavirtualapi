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

   	public function ordenes_trabajos(){
    	return $this->hasMany('App\Models\OrdenTrabajo');
    }
}
