<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaFormaPago;
use Response;

class VentaFormaPagoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas_formas_pagos = VentaFormaPago::with("forma_pago")->get();
        return $ventas_formas_pagos;
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
        $venta_forma_pago = new VentaFormaPago;
        $venta_forma_pago->nro_documento = $request->input('nro_documento');
        $venta_forma_pago->valor = $request->input('valor');
        $venta_forma_pago->fecha_vencimiento = $request->input('fecha_vencimiento');
        $venta_forma_pago->rut = $request->input('rut');
        $venta_forma_pago->venta_id = $request->input('venta_id');
        $venta_forma_pago->forma_pago_id = $request->input('forma_pago_id');
        $venta_forma_pago->save();
        return $venta_forma_pago;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta_forma_pago = VentaFormaPago::with("forma_pago")->find($id);
        if (!$venta_forma_pago) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $venta_forma_pago;
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
        $venta_forma_pago = VentaFormaPago::find($id);
        if(!$venta_forma_pago){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $venta_forma_pago->nro_documento = $request->input('nro_documento');
        $venta_forma_pago->valor = $request->input('valor');
        $venta_forma_pago->fecha_vencimiento = $request->input('fecha_vencimiento');
        $venta_forma_pago->rut = $request->input('rut');
        $venta_forma_pago->venta_id = $request->input('venta_id');
        $venta_forma_pago->forma_pago_id = $request->input('forma_pago_id');
        $venta_forma_pago->save();
        return $venta_forma_pago;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta_forma_pago = VentaFormaPago::find($id);
        if(!$venta_forma_pago){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $venta_forma_pago->delete();
        return "Venta forma pago eliminado";
    }
}
