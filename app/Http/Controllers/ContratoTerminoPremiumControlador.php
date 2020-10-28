<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoTerminoPremium;
use Response;

class ContratoTerminoPremiumControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos_terminos_premiums = ContratoTerminoPremium::with("contrato.cliente", "usuario", "orden_trabajo")->get();
        return $contratos_terminos_premiums;
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
        $contratos_termino_premium = new ContratoTerminoPremium;
        $contratos_termino_premium->fecha = $request->input('fecha');
        $contratos_termino_premium->mes = $request->input('mes');
        $contratos_termino_premium->anio = $request->input('anio');
        $contratos_termino_premium->contrato_id = $request->input('contrato_id');
        $contratos_termino_premium->usuario_id = $request->input('usuario_id');
        $contratos_termino_premium->orden_trabajo_id = $request->input('orden_trabajo_id');
        $contratos_termino_premium->save();
        return $contratos_termino_premium;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratos_termino_premium = ContratoTerminoPremium::with("contrato.cliente", "usuario", "orden_trabajo")->find($id);
        if (!$contratos_termino_premium) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $contratos_termino_premium;
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
        $contratos_termino_premium = ContratoTerminoPremium::find($id);
        if(!$contratos_termino_premium){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contratos_termino_premium->fecha = $request->input('fecha');
        $contratos_termino_premium->mes = $request->input('mes');
        $contratos_termino_premium->anio = $request->input('anio');
        $contratos_termino_premium->contrato_id = $request->input('contrato_id');
        $contratos_termino_premium->usuario_id = $request->input('usuario_id');
        $contratos_termino_premium->orden_trabajo_id = $request->input('orden_trabajo_id');
        $contratos_termino_premium->save();
        return $contratos_termino_premium;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contratos_termino_premium = ContratoTerminoPremium::find($id);
        if(!$contratos_termino_premium){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contratos_termino_premium->delete();
        return "Contrato termino premium eliminado";
    }
}
