<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
   protected $table = 'empresas';

    protected $fillable = [
        'rut', 'razon_social', 'bolfolio', 'movbol', 'movfact', 'racorta'
   	];
}
