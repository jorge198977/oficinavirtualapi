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

    public function contratos_adicionales(){
        return $this->hasMany('App\Models\ContratoAdicional');
    }

    public function contratos_inets(){
        return $this->hasMany('App\Models\ContratoInet');
    }

    public function contratos_terminos(){
        return $this->hasMany('App\Models\ContratoTermino');
    }

    public function contratos_terminos_premiums(){
        return $this->hasMany('App\Models\ContratoTerminoPremium');
    }

    public function cargas_adicionales(){
        return $this->hasMany('App\Models\CargaAdicional');
    }

    public function crea_230s(){
        return $this->hasMany('App\Models\Crea230');
    }

    public function ventas(){
        return $this->hasMany('App\Models\Venta');
    }

    public function contratos_premiums(){
        return $this->hasMany('App\Models\ContratoPremium');
    }

    public function cms_clientes(){
        return $this->hasMany('App\Models\CmCliente');
    }

    public function onts_clientes(){
        return $this->hasMany('App\Models\OntCliente');
    }
}
