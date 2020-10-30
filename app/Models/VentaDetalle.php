<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
    protected $table = "ventas_detalles";

    protected $fillable = ['producto', 'valor_final', 'descripcion', 'venta_id'];

    public function venta(){
    	return $this->belongsTo('App\Models\Venta', 'venta_id');
    }
}
