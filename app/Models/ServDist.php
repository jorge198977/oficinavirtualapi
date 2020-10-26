<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServDist extends Model
{
    protected $table = "servdists";

    protected $fillable = ['servicio'];
}
