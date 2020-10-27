<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajoAsigna extends Model
{
    protected $table = "ots_asignas";

    protected $fillable = ['fecha', 'hora', 'orden_trabajo_id', 'usuario_id', 'tecnico_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Models\OrdenTrabajo', 'orden_trabajo_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }

    public function tecnico(){
    	return $this->belongsTo('App\Models\Tecnico', 'tecnico_id');
    }
}
