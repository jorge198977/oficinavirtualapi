<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajoAsigna;
use Response;

class OrdenTrabajoAsignaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes_trabajos_asignas = OrdenTrabajoAsigna::with("orden_trabajo", "usuario", "tecnico")->get();
        return $ordenes_trabajos_asignas;
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
        $orden_trabajo_asigna = new OrdenTrabajoAsigna;
        $orden_trabajo_asigna->fecha = $request->input('fecha');
        $orden_trabajo_asigna->hora = $request->input('hora');
        $orden_trabajo_asigna->orden_trabajo_id = $request->input('orden_trabajo_id');
        $orden_trabajo_asigna->usuario_id = $request->input('usuario_id');
        $orden_trabajo_asigna->tecnico_id = $request->input('tecnico_id');
        $orden_trabajo_asigna->save();
        return $orden_trabajo_asigna;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden_trabajo_asigna = OrdenTrabajoAsigna::with("orden_trabajo", "usuario", "tecnico")->find($id);
        if (!$orden_trabajo_asigna) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $orden_trabajo_asigna;
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

        $orden_trabajo_asigna = OrdenTrabajoAsigna::find($id);
        if(!$orden_trabajo_asigna){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo_asigna->fecha = $request->input('fecha');
        $orden_trabajo_asigna->hora = $request->input('hora');
        $orden_trabajo_asigna->orden_trabajo_id = $request->input('orden_trabajo_id');
        $orden_trabajo_asigna->usuario_id = $request->input('usuario_id');
        $orden_trabajo_asigna->tecnico_id = $request->input('tecnico_id');
        $orden_trabajo_asigna->save();
        return $orden_trabajo_asigna;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $orden_trabajo_asigna = OrdenTrabajoAsigna::find($id);
        if(!$orden_trabajo_asigna){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo_asigna->delete();
        return "OT asgina eliminado";
    }
}
