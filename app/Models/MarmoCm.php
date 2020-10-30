<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarmoCm extends Model
{
    protected $table = 'marmocms';

    protected $fillable = [
        'marca', 'modelo', 'tipo', 'docsis', 'url'
   	];

    public function cmmacs()
   	{
       return $this->hasMany('App\Models\CmMac');
   	}
}
