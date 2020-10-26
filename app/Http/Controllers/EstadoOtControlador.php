<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoOt;
use Response;

class EstadoOtControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados_ots = EstadoOt::get();
        return $estados_ots;
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
            'descripcion' => 'required|unique:estados_ots'
        ]);
    
        $estado_ot = new EstadoOt;
        $estado_ot->descripcion = $request->input('descripcion');
        $estado_ot->save();
        return $estado_ot;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado_ot = EstadoOt::find($id);
        if(!$estado_ot){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $estado_ot;
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
        $estado_ot = EstadoOt::find($id);
        if(!$estado_ot){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_ot->descripcion = $request->input('descripcion');
        $estado_ot->save();
        return $estado_ot;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_ot = EstadoOt::find($id);
        if(!$estado_ot){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $estado_ot->delete();
        return "Estado de OT eliminado";
    }
}
