<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCargaAdicional extends Model
{
    protected $table = 'tipos_cargas_adicionales';

    protected $fillable = [
        'descripcion'
   	];

   	public function cargas_adicionales(){
        return $this->hasMany('App\Models\CargaAdicional');
    }
}
