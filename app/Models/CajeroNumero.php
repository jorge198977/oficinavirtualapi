<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajeroNumero extends Model
{
    protected $table = "cajeros_numeros";

    protected $fillable = ['fecha', 'usuario_id'];

    public function usuario(){
    	return $this->belongsTo('App\Models\User', 'usuario_id');
    }
}
