<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documentos';

    protected $fillable = [
        'tipo_documento'
   	];

   	public function movimientos_ventas(){
    	return $this->hasMany('App\Models\MovimientoVenta');
    }
}
