<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'usuario', 'password', 'rut', 'nombre', 
        'administrador', 'boleta', 'vigente', 'boleta1', 
        'boleta2', 'boleta3', 'root', 'externo', 'caja', 
        'boleta4', 'email', 'tipo_usuario_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipo_usuario()
    {
        return $this->belongsTo('App\Models\TipoUsuario', 'tipo_usuario_id');
    }

    public function ordenes_trabajos(){
        return $this->hasMany('App\Models\OrdenTrabajo');
    }
}
