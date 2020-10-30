<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OntCliente extends Model
{
    protected $table = "ont_clientes";

    protected $fillable = ['serial', 'estado', 'ssid', 'clave_wifi', 'wifi_enabled', 'contrato_id', 'orden_trabajo_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function orden_trabajo(){
    	return $this->belongsTo('App\Models\OrdenTrabajo', 'orden_trabajo_id');
    }
}
