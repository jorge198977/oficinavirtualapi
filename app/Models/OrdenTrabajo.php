<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
     protected $table = "ordenes_trabajos";

    protected $fillable = ['fecha_recepcion', 'nula', 'tipo_ot_id', 'contrato_id', 'tipo_reclamo_id', 'estado_ot_id', 'usuario_id'];

    public function tipo_ot(){
    	return $this->belongsTo('App\Models\TipoOt', 'tipo_ot_id');
    }

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function tipo_reclamo(){
    	return $this->belongsTo('App\Models\TipoReclamo', 'tipo_reclamo_id');
    }

    public function estado_ot(){
    	return $this->belongsTo('App\Models\EstadoOt', 'estado_ot_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }
}
