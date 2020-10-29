<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoVenta extends Model
{
    protected $table = "movimientos_ventas";

    protected $fillable = ['descripcion', 'operacion', 'signo', 'ingreso_manual', 'usa_iva', 'imprime', 'tipo_moviento', 'tipo_documento_id'];

    public function tipo_documento(){
    	return $this->belongsTo('App\Models\TipoDocumento', 'tipo_documento_id');
    }
}
