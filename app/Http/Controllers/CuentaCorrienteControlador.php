<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaCorriente;
use Response;

class CuentaCorrienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas_corrientes = CuentaCorriente::with("contrato.cliente", "movimiento_ctacte", "venta")->get();
        return $cuentas_corrientes;
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
        $cuenta_corriente = new CuentaCorriente;
        $cuenta_corriente->fecha_documento = $request->input('fecha_documento');
        $cuenta_corriente->fecha_vencimiento = $request->input('fecha_vencimiento');
        $cuenta_corriente->valor = $request->input('valor');
        $cuenta_corriente->signo = $request->input('signo');
        $cuenta_corriente->movimiento_ctacte_id = $request->input('movimiento_ctacte_id');
        $cuenta_corriente->venta_id = $request->input('venta_id');
        $cuenta_corriente->contrato_id = $request->input('contrato_id');
        $cuenta_corriente->save();
        return $cuenta_corriente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuenta_corriente = CuentaCorriente::with("contrato.cliente", "movimiento_ctacte", "venta")->find($id);
        if (!$cuenta_corriente) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $cuenta_corriente;
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
            'fecha_documento' => 'required',
            'fecha_vencimiento' => 'required',
            'valor' => 'required'
        ]);
        $cuenta_corriente = CuentaCorriente::find($id);
        if(!$cuenta_corriente){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cuenta_corriente->fecha_documento = $request->input('fecha_documento');
        $cuenta_corriente->fecha_vencimiento = $request->input('fecha_vencimiento');
        $cuenta_corriente->valor = $request->input('valor');
        $cuenta_corriente->signo = $request->input('signo');
        $cuenta_corriente->movimiento_ctacte_id = $request->input('movimiento_ctacte_id');
        $cuenta_corriente->venta_id = $request->input('venta_id');
        $cuenta_corriente->contrato_id = $request->input('contrato_id');
        $cuenta_corriente->save();
        return $cuenta_corriente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuenta_corriente = CuentaCorriente::find($id);
        if(!$cuenta_corriente){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cuenta_corriente->delete();
        return "Ctacte eliminada";
    }
}
