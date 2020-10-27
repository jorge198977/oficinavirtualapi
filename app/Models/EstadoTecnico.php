<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTecnico extends Model
{
    protected $table = "estados_tecnicos";

    protected $fillable = ['descripcion'];

    public function tecnicos(){
    	return $this->hasMany('App\Models\Tecnico');
    }
}
