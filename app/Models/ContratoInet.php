<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoInet extends Model
{
    protected $table = "contratos_inets";

    protected $fillable = ['contrato_id', 'servinet_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function servinet(){
    	return $this->belongsTo('App\Models\ServInet', 'servinet_id');
    }
}
