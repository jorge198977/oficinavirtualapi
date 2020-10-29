<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimientoVenta;
use Response;

class MovimientoVentaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos_ventas = MovimientoVenta::with("tipo_documento")->get();
        return $movimientos_ventas;
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
        $movimiento_venta = new MovimientoVenta;
        $movimiento_venta->descripcion = $request->input('descripcion');
        $movimiento_venta->operacion = $request->input('operacion');
        $movimiento_venta->signo = $request->input('signo');
        $movimiento_venta->ingreso_manual = $request->input('ingreso_manual');
        $movimiento_venta->usa_iva = $request->input('usa_iva');
        $movimiento_venta->imprime = $request->input('imprime');
        $movimiento_venta->tipo_movimiento = $request->input('tipo_movimiento');
        $movimiento_venta->tipo_documento_id = $request->input('tipo_documento_id');
        $movimiento_venta->save();
        return $movimiento_venta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento_venta = MovimientoVenta::with("tipo_documento")->find($id);
        if (!$movimiento_venta) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $movimiento_venta;
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

        $movimiento_venta = MovimientoVenta::find($id);
        if(!$movimiento_venta){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }

        $movimiento_venta->descripcion = $request->input('descripcion');
        $movimiento_venta->operacion = $request->input('operacion');
        $movimiento_venta->signo = $request->input('signo');
        $movimiento_venta->ingreso_manual = $request->input('ingreso_manual');
        $movimiento_venta->usa_iva = $request->input('usa_iva');
        $movimiento_venta->imprime = $request->input('imprime');
        $movimiento_venta->tipo_movimiento = $request->input('tipo_movimiento');
        $movimiento_venta->tipo_documento_id = $request->input('tipo_documento_id');
        $movimiento_venta->save();
        return $movimiento_venta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimiento_venta = MovimientoVenta::find($id);
        if(!$movimiento_venta){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $movimiento_venta->delete();
        return "Calle eliminada";
    }
}
