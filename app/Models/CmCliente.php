<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmCliente extends Model
{
    protected $table = "cmclientes";

    protected $fillable = ['fecha', 'bpi', 'email', 'clavewifi', 'primerpago', 'contrato_id', 'cmmac_id', 'orden_trabajo_id', 'estado_cm_id'];

    public function contrato(){
    	return $this->belongsTo('App\Models\Contrato', 'contrato_id');
    }

    public function cmmac(){
    	return $this->belongsTo('App\Models\CmMac', 'cmmac_id');
    }

    public function estado_cm(){
    	return $this->belongsTo('App\Models\EstadoCm', 'estado_cm_id');
    }

    public function orden_trabajo(){
    	return $this->belongsTo('App\Models\OrdenTrabajo', 'orden_trabajo_id');
    }
}
