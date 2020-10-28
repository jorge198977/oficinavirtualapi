<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crea230 extends Model
{
    protected $table = "crea_230";

    protected $fillable = ['mes', 'anio', 'cable', 'internet', 'premium', 'boca', 'descuento', 'valor_230', 'contrato_id', 'carga_adicional_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function carga_adicional(){
    	return $this->belongsTo('App\Models\CargaAdicional', 'carga_adicional_id');
    }
}
