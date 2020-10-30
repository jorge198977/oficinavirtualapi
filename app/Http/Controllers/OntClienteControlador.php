<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OntCliente;
use Response;

class OntClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onts_clientes = OntCliente::with("contrato.cliente", "orden_trabajo")->get();
        return $onts_clientes;
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
        $ont_cliente = new OntCliente;
        $ont_cliente->serial = $request->input('serial');
        $ont_cliente->estado = $request->input('estado');
        $ont_cliente->ssid = $request->input('ssid');
        $ont_cliente->clave_wifi = $request->input('clave_wifi');
        $ont_cliente->wifi_enabled = $request->input('wifi_enabled');
        $ont_cliente->contrato_id = $request->input('contrato_id');
        $ont_cliente->orden_trabajo_id = $request->input('orden_trabajo_id');
        $ont_cliente->save();
        return $ont_cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ont_cliente = OntCliente::with("contrato.cliente", "orden_trabajo")->find($id);
        if (!$ont_cliente) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $ont_cliente;
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
            'serial' => 'required'
        ]);
        $ont_cliente = OntCliente::find($id);
        if(!$ont_cliente){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ont_cliente->serial = $request->input('serial');
        $ont_cliente->estado = $request->input('estado');
        $ont_cliente->ssid = $request->input('ssid');
        $ont_cliente->clave_wifi = $request->input('clave_wifi');
        $ont_cliente->wifi_enabled = $request->input('wifi_enabled');
        $ont_cliente->contrato_id = $request->input('contrato_id');
        $ont_cliente->orden_trabajo_id = $request->input('orden_trabajo_id');
        $ont_cliente->save();
        return $ont_cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ont_cliente = OntCliente::find($id);
        if(!$ont_cliente){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ont_cliente->delete();
        return "OntCliente eliminado";
    }
}
