<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    protected $table = "calles";

    protected $fillable = ['calle', 'poblacion_id'];

    public function poblacion(){
    	return $this->belongsTo('App\Models\Poblacion', 'poblacion_id');
    }
}
