<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoCtacte extends Model
{
    protected $table = 'movimientos_ctactes';

    protected $fillable = [
        'id', 'descripcion'
   	];


   	public function cuentas_corrientes(){
        return $this->hasMany('App\Models\CuentaCorriente');
    }
}
