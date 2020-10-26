<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = "planes";

    protected $fillable = ['descripcion', 'fecha_inicio', 'fecha_fin', 'vigente', 'meses', 'tipo_plan_id'];

    public function tipo_plan(){
    	return $this->belongsTo('App\Models\TipoPlan', 'tipo_plan_id');
    }

    public function contratos(){
    	return $this->hasMany('App\Models\Contrato');
    }
}
