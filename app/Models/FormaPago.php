<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    protected $table = 'formas_pagos';

    protected $fillable = [
        'descripcion', 'tipo', 'operacion', 'codbanco'
   	];

   	public function ventas_formas_pagos(){
        return $this->hasMany('App\Models\VentaFormaPago');
    }
}
