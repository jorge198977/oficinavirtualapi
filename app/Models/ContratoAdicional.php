<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoAdicional extends Model
{
    protected $table = "contratos_adicionales";

    protected $fillable = ['cantidad', 'contrato_id', 'servicio_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function servicio(){
    	return $this->belongsTo('App\Models\Servicio', 'servicio_id');
    }

    public function crea_230s(){
        return $this->hasMany('App\Models\Crea230');
    }
}
