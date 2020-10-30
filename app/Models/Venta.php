<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";

    protected $fillable = ['documento', 'fecha', 'nula', 'hora', 'movimiento_venta_id', 'usuario_id', 'contrato_id'];

    public function movimiento_venta(){
    	return $this->belongsTo('App\Models\MovimientoVenta', 'movimiento_venta_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function ventas_detalles(){
        return $this->hasMany('App\Models\VentaDetalle');
    }
}
