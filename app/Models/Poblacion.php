<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    protected $table = "poblaciones";

    protected $fillable = ['poblacion', 'sector_id'];

    public function sector(){
    	return $this->belongsTo('App\Models\Sector', 'sector_id');
    }
}
