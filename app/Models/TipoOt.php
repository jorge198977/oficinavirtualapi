<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoOt extends Model
{
     protected $table = "tipos_ots";

    protected $fillable = ['nombre', 'servdist_id', 'revisa'];

    public function servs_dists(){
    	return $this->belongsTo('App\Models\ServDist', 'servdist_id');
    }

    public function ordenes_trabajos(){
    	return $this->hasMany('App\Models\OrdenTrabajo');
    }
}
