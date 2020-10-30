<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarmoOnt extends Model
{
    protected $table = 'marmos_onts';

    protected $fillable = [
        'marca', 'modelo', 'CATV', 'wireless', 'wireless5'
   	];

   	public function onts_series(){
        return $this->hasMany('App\Models\OntSerie');
    }
}
