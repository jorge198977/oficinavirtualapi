<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaCorriente extends Model
{
    protected $table = "cuentas_corrientes";

    protected $fillable = ['fecha_documento', 'fecha_vencimiento', 'valor', 'signo', 'movimiento_ctacte_id', 'venta_id', 'contrato_id'];

    public function movimiento_ctacte(){
    	return $this->belongsTo('App\Models\MovimientoCtacte', 'movimiento_ctacte_id');
    }

    public function venta(){
    	return $this->belongsTo('App\Models\Venta', 'venta_id');
    }

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }
}
