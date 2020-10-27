<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoTecnico;
use Response;

class EstadoTecnicoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados_tecnicos = EstadoTecnico::get();
        return $estados_tecnicos;
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
            'descripcion' => 'required|unique:estados_tecnicos'
        ]);
    
        $estado_tecnico = new EstadoTecnico;
        $estado_tecnico->descripcion = $request->input('descripcion');
        $estado_tecnico->save();
        return $estado_tecnico;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado_tecnico = EstadoTecnico::find($id);
        if(!$estado_tecnico){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $estado_tecnico;
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
        $estado_tecnico = EstadoTecnico::find($id);
        if(!$estado_tecnico){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_tecnico->descripcion = $request->input('descripcion');
        $estado_tecnico->save();
        return $estado_tecnico;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_tecnico = EstadoTecnico::find($id);
        if(!$estado_tecnico){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_tecnico->delete();
        return "Estado tecnico eliminado";
    }
}
