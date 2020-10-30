<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaDetalle;
use Response;

class VentaDetalleControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas_detalles = VentaDetalle::with("venta")->get();
        return $ventas_detalles;
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
        $venta_detalle = new VentaDetalle;
        $venta_detalle->producto = $request->input('producto');
        $venta_detalle->valor_final = $request->input('valor_final');
        $venta_detalle->descripcion = $request->input('descripcion');
        $venta_detalle->venta_id = $request->input('venta_id');
        $venta_detalle->save();
        return $venta_detalle;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta_detalle = VentaDetalle::with("venta")->find($id);
        if (!$venta_detalle) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $venta_detalle;
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
        $venta_detalle = VentaDetalle::find($id);
        if(!$venta_detalle){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $venta_detalle->producto = $request->input('producto');
        $venta_detalle->valor_final = $request->input('valor_final');
        $venta_detalle->descripcion = $request->input('descripcion');
        $venta_detalle->venta_id = $request->input('venta_id');
        $venta_detalle->save();
        return $venta_detalle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta_detalle = VentaDetalle::find($id);
        if(!$venta_detalle){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $venta_detalle->delete();
        return "Venta detalle eliminada";
    }
}
