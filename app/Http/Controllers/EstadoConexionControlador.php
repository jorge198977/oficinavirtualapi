<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoConexion;
use Response;

class EstadoConexionControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados_conexiones = EstadoConexion::get();
        return $estados_conexiones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:estados_conexiones'
        ]);
    
        $estado_conexion = new EstadoConexion;
        $estado_conexion->descripcion = $request->input('descripcion');
        $estado_conexion->save();
        return $estado_conexion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado_conexion = EstadoConexion::find($id);
        if(!$estado_conexion){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $estado_conexion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required'
        ]);
        $estado_conexion = EstadoConexion::find($id);
        if(!$estado_conexion){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_conexion->descripcion = $request->input('descripcion');
        $estado_conexion->save();
        return $estado_conexion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_conexion = EstadoConexion::find($id);
        if(!$estado_conexion){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_conexion->delete();
        return "Estado de Conexion eliminado";
    }
}
