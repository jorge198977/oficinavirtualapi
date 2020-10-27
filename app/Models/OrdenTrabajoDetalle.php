<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajoDetalle extends Model
{
    protected $table = "ordenes_trabajos_detalles";

    protected $fillable = ['cantidad', 'orden_trabajo_id', 'servicio_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Models\OrdenTrabajo', 'orden_trabajo_id');
    }

    public function servicio(){
    	return $this->belongsTo('App\Models\Servicio', 'servicio_id');
    }
}
