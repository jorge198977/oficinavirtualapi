<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $fillable = ['id', 'rut','nombres','paterno','materno','nacionalidad','telefono1','telefono2','email', 'giro'];

    public function contratos(){
      return $this->hasMany('App\Models\Contrato');
    }
    
   // public static function getcliente($correlativo){
   //    foreach ($correlativo as $corre) {
   //      return Cliente::where('id', '=', $corre->cliente_id)
   //                ->get();
   //    }
      
   //  } 
}
