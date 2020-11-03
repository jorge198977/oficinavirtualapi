<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = "tecnicos";

    protected $fillable = ['nombre', 'externo', 'usuario', 'clave', 'email', 'rut', 'FTTH', 'estado_tecnico_id'];

    public function estado_tecnico(){
    	return $this->belongsTo('App\Models\EstadoTecnico', 'estado_tecnico_id');
    }

    public function fichas_tecnicos(){
        return $this->hasMany('App\Models\FichaTecnico');
    }
}
