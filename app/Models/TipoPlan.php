<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlan extends Model
{
    protected $table = 'tipos_planes';

    protected $fillable = [
        'descripcion', 'servicio_id'
   	];


   	public function planes()
   	{
       return $this->hasMany('App\Models\Plan');
   	}

   	public function servicio(){
    	return $this->belongsTo('App\Models\Servicio');
    }
}
