<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmCliente;
use Response;

class CmClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cm_clientes = CmCliente::with("contrato.cliente", "cmmac", 'orden_trabajo', "estado_cm")->get();
        return $cm_clientes;
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
        $cm_cliente = new CmCliente;
        $cm_cliente->fecha = $request->input('fecha');
        $cm_cliente->bpi = $request->input('bpi');
        $cm_cliente->email = $request->input('email');
        $cm_cliente->clavewifi = $request->input('clavewifi');
        $cm_cliente->primerpago = $request->input('primerpago');
        $cm_cliente->contrato_id = $request->input('contrato_id');
        $cm_cliente->cmmac_id = $request->input('cmmac_id');
        $cm_cliente->orden_trabajo_id = $request->input('orden_trabajo_id');
        $cm_cliente->estado_cm_id = $request->input('estado_cm_id');
        $cm_cliente->save();
        return $cm_cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cm_cliente = CmCliente::with("contrato.cliente", "cmmac", 'orden_trabajo', "estado_cm")->find($id);
        if (!$cm_cliente) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $cm_cliente;
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
        $cm_cliente = CmCliente::find($id);
        if(!$cm_cliente){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cm_cliente->fecha = $request->input('fecha');
        $cm_cliente->bpi = $request->input('bpi');
        $cm_cliente->email = $request->input('email');
        $cm_cliente->clavewifi = $request->input('clavewifi');
        $cm_cliente->primerpago = $request->input('primerpago');
        $cm_cliente->contrato_id = $request->input('contrato_id');
        $cm_cliente->cmmac_id = $request->input('cmmac_id');
        $cm_cliente->orden_trabajo_id = $request->input('orden_trabajo_id');
        $cm_cliente->estado_cm_id = $request->input('estado_cm_id');
        $cm_cliente->save();
        return $cm_cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cm_cliente = CmCliente::find($id);
        if(!$cm_cliente){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cm_cliente->delete();
        return "CMCLIENTE eliminado";
    }
}
