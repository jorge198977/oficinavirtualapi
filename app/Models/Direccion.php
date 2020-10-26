<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = "direcciones";

    protected $fillable = ['calle_id', 'numero', 'depto_casa', 'block'];

    public function calle(){
    	return $this->belongsTo('App\Models\Calle', 'calle_id');
    }

    public function contratos(){
      return $this->hasMany('App\Models\Contrato');
    }
}
