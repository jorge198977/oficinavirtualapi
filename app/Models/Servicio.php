<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";

    protected $fillable = ['id', 'descripcion', 'valor', 'unica_vez'];


    public function tipos_planes(){
    	return $this->hasMany('App\Models\Tipo_plan');
    }

    public function ordenes_trabajos_detalles(){
    	return $this->hasMany('App\Models\OrdenTrabajoDetalle');
    }
}
