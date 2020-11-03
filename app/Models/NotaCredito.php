<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCredito extends Model
{
    protected $table = "notas_creditos";

    protected $fillable = ['observacion', 'venta_id', 'usuario_id'];

    public function venta(){
    	return $this->belongsTo('App\Models\Venta', 'venta_id');
    }

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }
}
