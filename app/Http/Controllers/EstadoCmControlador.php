<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoCm;
use Response;

class EstadoCmControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados_cms = EstadoCm::get();
        return $estados_cms;
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
            'descripcion' => 'required|unique:estados_cms'
        ]);
    
        $estado_cm = new EstadoCm;
        $estado_cm->descripcion = $request->input('descripcion');
        $estado_cm->save();
        return $estado_cm;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado_cm = EstadoCm::find($id);
        if(!$estado_cm){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $estado_cm;
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
        $estado_cm = EstadoCm::find($id);
        if(!$estado_cm){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_cm->descripcion = $request->input('descripcion');
        $estado_cm->save();
        return $estado_cm;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_cm = EstadoCm::find($id);
        if(!$estado_cm){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_cm->delete();
        return "Estado CM eliminado";
    }
}
