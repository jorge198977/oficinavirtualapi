<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServInet extends Model
{
    protected $table = "servinets";

    protected $fillable = ['id', 'descripcion', 'valor', 'costo', 'descuento', 'vigente', 'bajada', 'subida'];

    public function contratos_inets(){
        return $this->hasMany('App\Models\ContratoInet');
    }
}
