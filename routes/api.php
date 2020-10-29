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

// LISTAR ESTADOS OTS
Route::resource('estados_ots', 'EstadoOtControlador');

// LISTAR ESTADOS TECNICOS
Route::resource('estados_tecnicos', 'EstadoTecnicoControlador');

// LISTAR ESTADOS SERVDIST
Route::resource('serv_dists', 'ServDistControlador');

// LISTAR TIPOS OTS
Route::resource('tipos_ots', 'TipoOtControlador');

// LISTAR TIPOS RECLAMOS
Route::resource('tipos_reclamos', 'TipoReclamoControlador');

// LISTAR ORDENES DE TRABAJO
Route::resource('ordenes_trabajos', 'OrdenTrabajoControlador');

// LISTAR ORDENES DE TRABAJO DETALLE
Route::resource('ordenes_trabajos_detalles', 'OrdenTrabajoDetalleControlador');

// LISTAR ORDENES DE TRABAJO DIGITAL
Route::resource('ordenes_trabajos_digitales', 'OrdenTrabajoDigitalControlador');

// LISTAR ORDENES DE TRABAJO ASIGNA
Route::resource('ordenes_trabajos_asignas', 'OrdenTrabajoAsignaControlador');

// LISTAR TECNICOS
Route::resource('tecnicos', 'TecnicoControlador');

// LISTAR CONTRATOS
Route::resource('contratos', 'ContratoControlador');

// LISTAR CONTRATOS ADICIONALES
Route::resource('contratos_adicionales', 'ContratoAdicionalControlador');

// LISTAR SERV INETS
Route::resource('serv_inets', 'ServInetControlador');

// LISTAR CONTRATOS INETS
Route::resource('contratos_inets', 'ContratoInetControlador');

// LISTAR CONTRATOS TERMINO
Route::resource('contratos_terminos', 'ContratoTerminoControlador');

// LISTAR CONTRATOS TERMINO PREMIUM
Route::resource('contratos_terminos_premiums', 'ContratoTerminoPremiumControlador');

// LISTAR TIPOS CARGAS ADICIONALES
Route::resource('tipos_cargas_adicionales', 'TipoCargaAdicionalControlador');

// LISTAR CARGAS ADICIONALES
Route::resource('cargas_adicionales', 'CargaAdicionalControlador');

// LISTAR CREA230
Route::resource('crea_230', 'Crea230Controlador');

// LISTAR TIPOS DOCUMENTOS
Route::resource('tipos_documentos', 'TipoDocumentoControlador');

// LISTAR MOVIMIENTOS VENTAS
Route::resource('movimientos_ventas', 'MovimientoVentaControlador');