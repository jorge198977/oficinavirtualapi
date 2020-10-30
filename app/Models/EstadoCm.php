<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCm extends Model
{
    protected $table = "estados_cms";

    protected $fillable = ['descripcion'];

    public function cms_clientes(){
        return $this->hasMany('App\Models\CmCliente');
    }
}
