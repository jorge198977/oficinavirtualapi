<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajoDetalle;
use Response;

class OrdenTrabajoDetalleControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes_trabajos_detalles = OrdenTrabajoDetalle::with("orden_trabajo", "servicio")->get();
        return $ordenes_trabajos_detalles;
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
        $orden_trabajo_detalle = new OrdenTrabajoDetalle;
        $orden_trabajo_detalle->cantidad = $request->input('cantidad');
        $orden_trabajo_detalle->linea = $request->input('linea');
        $orden_trabajo_detalle->valor = $request->input('valor');
        $orden_trabajo_detalle->orden_trabajo_id = $request->input('orden_trabajo_id');
        $orden_trabajo_detalle->servicio_id = $request->input('servicio_id');
        $orden_trabajo_detalle->save();
        return $orden_trabajo_detalle;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden_trabajo_detalle = OrdenTrabajoDetalle::with("orden_trabajo", "servicio")->find($id);
        if (!$orden_trabajo_detalle) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $orden_trabajo_detalle;
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
            'cantidad' => 'required'
        ]);
        $orden_trabajo_detalle = OrdenTrabajoDetalle::find($id);
        if(!$orden_trabajo_detalle){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo_detalle->cantidad = $request->input('cantidad');
        $orden_trabajo_detalle->linea = $request->input('linea');
        $orden_trabajo_detalle->valor = $request->input('valor');
        $orden_trabajo_detalle->orden_trabajo_id = $request->input('orden_trabajo_id');
        $orden_trabajo_detalle->servicio_id = $request->input('servicio_id');
        $orden_trabajo_detalle->save();
        return $orden_trabajo_detalle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orden_trabajo_detalle = OrdenTrabajoDetalle::find($id);
        if(!$orden_trabajo_detalle){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo_detalle->delete();
        return "OT detalle eliminado";
    }
}
