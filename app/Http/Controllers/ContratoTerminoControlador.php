<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoTermino;
use Response;

class ContratoTerminoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos_terminos = ContratoTermino::with("contrato.cliente", "usuario", "orden_trabajo")->get();
        return $contratos_terminos;
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
        $contrato_termino = new ContratoTermino;
        $contrato_termino->fecha = $request->input('fecha');
        $contrato_termino->mensualidad = $request->input('mensualidad');
        $contrato_termino->mes = $request->input('mes');
        $contrato_termino->anio = $request->input('anio');
        $contrato_termino->motivo = $request->input('motivo');
        $contrato_termino->nota = $request->input('nota');
        $contrato_termino->contrato_id = $request->input('contrato_id');
        $contrato_termino->usuario_id = $request->input('usuario_id');
        $contrato_termino->orden_trabajo_id = $request->input('orden_trabajo_id');
        $contrato_termino->save();
        return $contrato_termino;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato_termino = ContratoTermino::with("contrato.cliente", "usuario", "orden_trabajo")->find($id);
        if (!$contrato_termino) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $contrato_termino;
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
        $contrato_termino = ContratoTermino::find($id);
        if(!$contrato_termino){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato_termino->fecha = $request->input('fecha');
        $contrato_termino->mensualidad = $request->input('mensualidad');
        $contrato_termino->mes = $request->input('mes');
        $contrato_termino->anio = $request->input('anio');
        $contrato_termino->motivo = $request->input('motivo');
        $contrato_termino->nota = $request->input('nota');
        $contrato_termino->contrato_id = $request->input('contrato_id');
        $contrato_termino->usuario_id = $request->input('usuario_id');
        $contrato_termino->orden_trabajo_id = $request->input('orden_trabajo_id');
        $contrato_termino->save();
        return $contrato_termino;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato_termino = ContratoTermino::find($id);
        if(!$contrato_termino){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato_termino->delete();
        return "Contrato termino eliminado";
    }
}
