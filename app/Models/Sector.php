<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = "sectores";

    protected $fillable = ['sector', 'comuna_id'];

    public function comuna(){
    	return $this->belongsTo('App\Models\Comuna', 'comuna_id');
    }
}
