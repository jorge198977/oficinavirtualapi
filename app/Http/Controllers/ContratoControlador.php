<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrato;
use Response;

class ContratoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::with("cliente", "plan", "estado_conexion", "direccion.calle.poblacion.sector.comuna")->get();
        return $contratos;
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
        $contrato = new Contrato;
        $contrato->correlativo_manual = $request->input('correlativo_manual');
        $contrato->fecha = $request->input('fecha');
        $contrato->cliente_id = $request->input('cliente_id');
        $contrato->plan_id = $request->input('plan_id');
        $contrato->fecha_inicio_pago = $request->input('fecha_inicio_pago');
        $contrato->dia_pago = $request->input('dia_pago');
        $contrato->fecha_conexion = $request->input('fecha_conexion');
        $contrato->estado_conexion_id = $request->input('estado_conexion_id');
        $contrato->fecha_estado_conexion = $request->input('fecha_estado_conexion');
        $contrato->observacion = $request->input('observacion');
        $contrato->motivo_desconexion = $request->input('motivo_desconexion');
        $contrato->direccion_id = $request->input('direccion_id');
        $contrato->save();
        return $contrato;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::with("cliente", "plan", "estado_conexion", "direccion.calle.poblacion.sector.comuna")->find($id);
        if (!$contrato) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $contrato;
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

        $contrato = Contrato::find($id);
        if(!$contrato){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato->correlativo_manual = $request->input('correlativo_manual');
        $contrato->fecha = $request->input('fecha');
        $contrato->cliente_id = $request->input('cliente_id');
        $contrato->plan_id = $request->input('plan_id');
        $contrato->fecha_inicio_pago = $request->input('fecha_inicio_pago');
        $contrato->dia_pago = $request->input('dia_pago');
        $contrato->fecha_conexion = $request->input('fecha_conexion');
        $contrato->estado_conexion_id = $request->input('estado_conexion_id');
        $contrato->fecha_estado_conexion = $request->input('fecha_estado_conexion');
        $contrato->observacion = $request->input('observacion');
        $contrato->motivo_desconexion = $request->input('motivo_desconexion');
        $contrato->direccion_id = $request->input('direccion_id');
        $contrato->save();
        return $contrato;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        if(!$contrato){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato->delete();
        return "Contrato eliminado";
    }
}
