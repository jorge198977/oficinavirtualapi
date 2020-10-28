<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoTermino extends Model
{
    protected $table = "contratos_terminos";

    protected $fillable = ['fecha', 'mensualidad', 'mes', 'anio', 'motivo', 'nota', 'contrato_id', 'usuario_id', 'orden_trabajo_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }

    public function orden_trabajo(){
    	return $this->belongsTo('App\Models\OrdenTrabajo', 'orden_trabajo_id');
    }
}
