<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correinterno extends Model
{
    protected $table = "correinternos";

    protected $fillable = ['ndocumento', 'nulo', 'venta_id'];

    public function venta(){
    	return $this->belongsTo('App\Models\Venta', 'venta_id');
    }
}
