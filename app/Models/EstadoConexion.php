<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoConexion extends Model
{
    protected $table = "estados_conexiones";

    protected $fillable = ['descripcion'];

    public function contratos(){
      return $this->hasMany('App\Models\Contrato');
    }
}
