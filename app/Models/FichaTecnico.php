<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaTecnico extends Model
{
    protected $table = "fichas_tecnicos";

    protected $fillable = ['fecha_inicio', 'fecha_fin', 'fecha', 'hora', 'cantidad', 'usuario_id', 'tecnico_id'];

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }

    public function tecnico(){
    	return $this->belongsTo('App\Models\Tecnico', 'tecnico_id');
    }
}
