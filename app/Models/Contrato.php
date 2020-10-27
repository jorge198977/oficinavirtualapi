<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = "contratos";

    protected $fillable = ['correlativo_manual', 'fecha', 'cliente_id', 'plan_id', 'fecha_inicio_pago', 'dia_pago', 'fecha_conexion', 'estado_conexion_id', 'fecha_estado_conexion', 'observacion', 'motivo_desconexion', 'direccion_id'];

    public function cliente(){
    	return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }

    public function plan(){
    	return $this->belongsTo('App\Models\Plan', 'plan_id');
    }

    public function estado_conexion(){
    	return $this->belongsTo('App\Models\EstadoConexion', 'estado_conexion_id');
    }

    public function direccion(){
    	return $this->belongsTo('App\Models\Direccion', 'direccion_id');
    }

    public function ordenes_trabajos(){
        return $this->hasMany('App\Models\OrdenTrabajo');
    }
}
