<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// LISTAR TIPOS USUARIOS
Route::resource('tipos_usuarios', 'TipoUsuarioControlador');

// LISTAR USUARIOS
Route::resource('usuarios', 'UsuarioControlador');

// LISTAR CLIENTES
Route::resource('clientes', 'ClienteControlador');

// LISTAR SERVICIOS
Route::resource('servicios', 'ServicioControlador');

// LISTAR TIPO PLAN
Route::resource('tipos_planes', 'TipoPlanControlador');