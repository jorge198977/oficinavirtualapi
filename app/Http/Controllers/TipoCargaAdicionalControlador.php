<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCargaAdicional;
use Response;

class TipoCargaAdicionalControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_cargas_adicionales = TipoCargaAdicional::get();
        return $tipos_cargas_adicionales;
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
            'descripcion' => 'required|unique:tipos_cargas_adicionales'
        ]);
    
        $tipo_carga_adicional = new TipoCargaAdicional;
        $tipo_carga_adicional->descripcion = $request->input('descripcion');
        $tipo_carga_adicional->save();
        return $tipo_carga_adicional;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_carga_adicional = TipoCargaAdicional::find($id);
        if(!$tipo_carga_adicional){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $tipo_carga_adicional;
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
        $tipo_carga_adicional = TipoCargaAdicional::find($id);
        if(!$tipo_carga_adicional){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_carga_adicional->descripcion = $request->input('descripcion');
        $tipo_carga_adicional->save();
        return $tipo_carga_adicional;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_carga_adicional = TipoCargaAdicional::find($id);
        if(!$tipo_carga_adicional){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_carga_adicional->delete();
        return "Tipo carga adicional eliminado";
    }
}
