<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaAdicional extends Model
{
    protected $table = "cargas_adicionales";

    protected $fillable = ['valor', 'observacion', 'mes', 'anio', 'contrato_id', 'tipo_carga_id', 'orden_trabajo_id', 'usuario_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function tipo_carga(){
    	return $this->belongsTo('App\Models\TipoCargaAdicional', 'tipo_carga_id');
    }

    public function orden_trabajo(){
    	return $this->belongsTo('App\Models\OrdenTrabajo', 'orden_trabajo_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }
}
