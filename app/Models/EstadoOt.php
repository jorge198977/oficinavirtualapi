<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoOt extends Model
{
     protected $table = "estados_ots";

    protected $fillable = ['descripcion'];

    public function ordenes_trabajos(){
    	return $this->hasMany('App\Models\OrdenTrabajo');
    }
}
