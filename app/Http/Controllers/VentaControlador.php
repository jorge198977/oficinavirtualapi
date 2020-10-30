<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Response;

class VentaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::with("movimiento_venta", "usuario", "contrato.cliente")->get();
        return $ventas;
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
        $venta = new Venta;
        $venta->documento = $request->input('documento');
        $venta->fecha = $request->input('fecha');
        $venta->nula = $request->input('nula');
        $venta->hora = $request->input('hora');
        $venta->movimiento_venta_id = $request->input('movimiento_venta_id');
        $venta->usuario_id = $request->input('usuario_id');
        $venta->contrato_id = $request->input('contrato_id');
        $venta->save();
        return $venta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::with("movimiento_venta", "usuario", "contrato.cliente")->find($id);
        if (!$venta) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $venta;
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

        $venta = Venta::find($id);
        if(!$venta){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $venta->documento = $request->input('documento');
        $venta->fecha = $request->input('fecha');
        $venta->nula = $request->input('nula');
        $venta->hora = $request->input('hora');
        $venta->movimiento_venta_id = $request->input('movimiento_venta_id');
        $venta->usuario_id = $request->input('usuario_id');
        $venta->contrato_id = $request->input('contrato_id');
        $venta->save();
        return $venta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::find($id);
        if(!$venta){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $venta->delete();
        return "Venta eliminada";
    }
}
