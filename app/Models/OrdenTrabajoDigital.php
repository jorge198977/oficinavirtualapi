<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajoDigital extends Model
{
    protected $table = "ot_digitales";

    protected $fillable = ['cantidad', 'orden_trabajo_id'];

    public function orden_trabajo(){
    	return $this->belongsTo('App\Models\OrdenTrabajo', 'orden_trabajo_id');
    }
}
