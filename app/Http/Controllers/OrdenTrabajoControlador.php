<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajo;
use Response;

class OrdenTrabajoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes_trabajos = OrdenTrabajo::with("tipo_ot", "contrato.cliente", "tipo_reclamo", "estado_ot", "usuario")->get();
        return $ordenes_trabajos;
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
        $orden_trabajo = new OrdenTrabajo;
        $orden_trabajo->fecha_recepcion = $request->input('fecha_recepcion');
        $orden_trabajo->nula = $request->input('nula');
        $orden_trabajo->tipo_ot_id = $request->input('tipo_ot_id');
        $orden_trabajo->contrato_id = $request->input('contrato_id');
        $orden_trabajo->tipo_reclamo_id = $request->input('tipo_reclamo_id');
        $orden_trabajo->estado_ot_id = $request->input('estado_ot_id');
        $orden_trabajo->usuario_id = $request->input('usuario_id');
        $orden_trabajo->save();
        return $orden_trabajo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden_trabajo = OrdenTrabajo::with("tipo_ot", "contrato.cliente", "tipo_reclamo", "estado_ot", "usuario")->find($id);
        if (!$orden_trabajo) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $orden_trabajo;
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
            'fecha_recepcion' => 'required'
        ]);
        $orden_trabajo = OrdenTrabajo::find($id);
        if(!$orden_trabajo){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo->fecha_recepcion = $request->input('fecha_recepcion');
        $orden_trabajo->nula = $request->input('nula');
        $orden_trabajo->tipo_ot_id = $request->input('tipo_ot_id');
        $orden_trabajo->contrato_id = $request->input('contrato_id');
        $orden_trabajo->tipo_reclamo_id = $request->input('tipo_reclamo_id');
        $orden_trabajo->estado_ot_id = $request->input('estado_ot_id');
        $orden_trabajo->usuario_id = $request->input('usuario_id');
        $orden_trabajo->save();
        return $orden_trabajo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orden_trabajo = OrdenTrabajo::find($id);
        if(!$orden_trabajo){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo->delete();
        return "OT eliminada";
    }
}
