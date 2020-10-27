<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoReclamo;
use Response;

class TipoReclamoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_reclamos = TipoReclamo::get();
        return $tipos_reclamos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'descripcion' => 'required|unique:tipos_reclamos'
        ]);
    
        $tipo_reclamo = new TipoReclamo;
        $tipo_reclamo->descripcion = $request->input('descripcion');
        $tipo_reclamo->save();
        return $tipo_reclamo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_reclamo = TipoReclamo::find($id);
        if(!$tipo_reclamo){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $tipo_reclamo;
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
        $tipo_reclamo = TipoReclamo::find($id);
        if(!$tipo_reclamo){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_reclamo->descripcion = $request->input('descripcion');
        $tipo_reclamo->save();
        return $tipo_reclamo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_reclamo = TipoReclamo::find($id);
        if(!$tipo_reclamo){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_reclamo->delete();
        return "Tipo de usuario eliminado";
    }
}
