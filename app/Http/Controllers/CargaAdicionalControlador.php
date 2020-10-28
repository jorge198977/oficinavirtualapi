<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CargaAdicional;
use Response;

class CargaAdicionalControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargas_adicionales = CargaAdicional::with("contrato", "tipo_carga", "orden_trabajo", "usuario")->get();
        return $cargas_adicionales;
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
        $carga_adicional = new CargaAdicional;
        $carga_adicional->valor = $request->input('valor');
        $carga_adicional->observacion = $request->input('observacion');
        $carga_adicional->mes = $request->input('mes');
        $carga_adicional->anio = $request->input('anio');
        $carga_adicional->contrato_id = $request->input('contrato_id');
        $carga_adicional->tipo_carga_id = $request->input('tipo_carga_id');
        $carga_adicional->orden_trabajo_id = $request->input('orden_trabajo_id');
        $carga_adicional->usuario_id = $request->input('usuario_id');
        $carga_adicional->save();
        return $carga_adicional;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carga_adicional = CargaAdicional::with("contrato", "tipo_carga", "orden_trabajo", "usuario")->find($id);
        if (!$carga_adicional) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $carga_adicional;
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
        $carga_adicional = CargaAdicional::find($id);
        if(!$carga_adicional){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $carga_adicional->valor = $request->input('valor');
        $carga_adicional->observacion = $request->input('observacion');
        $carga_adicional->mes = $request->input('mes');
        $carga_adicional->anio = $request->input('anio');
        $carga_adicional->contrato_id = $request->input('contrato_id');
        $carga_adicional->tipo_carga_id = $request->input('tipo_carga_id');
        $carga_adicional->orden_trabajo_id = $request->input('orden_trabajo_id');
        $carga_adicional->usuario_id = $request->input('usuario_id');
        $carga_adicional->save();
        return $carga_adicional;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carga_adicional = CargaAdicional::find($id);
        if(!$carga_adicional){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $carga_adicional->delete();
        return "Carga adicional eliminada";
    }
}
