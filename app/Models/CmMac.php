<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmMac extends Model
{
    protected $table = "cmmacs";

    protected $fillable = ['id', 'cm', 'servinet_id', 'marmocm_id'];

    public function serv_inet(){
    	return $this->belongsTo('App\Models\ServInet', 'servinet_id');
    }

    public function marmo_cm(){
    	return $this->belongsTo('App\Models\MarmoCm', 'marmocm_id');
    }

    public function cms_clientes(){
        return $this->hasMany('App\Models\CmCliente');
    }
}
