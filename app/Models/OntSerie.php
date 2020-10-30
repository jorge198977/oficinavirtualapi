<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OntSerie extends Model
{
    protected $table = "onts_series";

    protected $fillable = ['serie', 'nombre', 'estado', 'marmo_ont_id'];

    public function marmo_ont(){
    	return $this->belongsTo('App\Models\MarmoOnt', 'marmo_ont_id');
    }


}
