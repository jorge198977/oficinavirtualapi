<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaFormaPago extends Model
{
    protected $table = "ventas_formas_pagos";

    protected $fillable = ['nro_documento', 'valor', 'fecha_vencimiento', 'rut', 'venta_id', 'forma_pago_id'];

    public function forma_pago(){
    	return $this->belongsTo('App\Models\FormaPago', 'forma_pago_id');
    }

    public function venta(){
    	return $this->belongsTo('App\Models\Venta', 'venta_id');
    }
}
