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

// LISTAR TIPO PLANES
Route::resource('planes', 'PlanControlador');

// LISTAR COMUNAS
Route::resource('comunas', 'ComunaControlador');

// LISTAR SECTORES
Route::resource('sectores', 'SectorControlador');

// LISTAR POBLACIONES
Route::resource('poblaciones', 'PoblacionControlador');

// LISTAR Calles
Route::resource('calles', 'CalleControlador');

// LISTAR DIRECCIONES
Route::resource('direcciones', 'DireccionControlador');

// LISTAR CAJERONUMEROS
Route::resource('cajeros_numeros', 'CajeroNumeroControlador');

// LISTAR ESTADOS CONEXIONES
Route::resource('estados_conexiones', 'EstadoConexionControlador');

// LISTAR ESTADOS EMPRESAS
Route::resource('empresas', 'EmpresaControlador');

// LISTAR CONTRATOS
Route::resource('contratos', 'ContratoControlador');