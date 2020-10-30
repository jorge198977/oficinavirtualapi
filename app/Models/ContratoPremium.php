<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratoPremium extends Model
{
    protected $table = "contratospremiums";

    protected $fillable = ['valor', 'contrato_id', 'servicio_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function servicio(){
    	return $this->belongsTo('App\Models\Servicio', 'servicio_id');
    }
}
