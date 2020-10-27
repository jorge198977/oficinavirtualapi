<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenTrabajoDigital;
use Response;

class OrdenTrabajoDigitalControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes_trabajos_digitales = OrdenTrabajoDigital::with("orden_trabajo")->get();
        return $ordenes_trabajos_digitales;
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
        $orden_trabajo_digital = new OrdenTrabajoDigital;
        $orden_trabajo_digital->cantidad = $request->input('cantidad');
        $orden_trabajo_digital->orden_trabajo_id = $request->input('orden_trabajo_id');
        $orden_trabajo_digital->save();
        return $orden_trabajo_digital;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orden_trabajo_digital = OrdenTrabajoDigital::with("orden_trabajo")->find($id);
        if (!$orden_trabajo_digital) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $orden_trabajo_digital;
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
        $orden_trabajo_digital = OrdenTrabajoDigital::find($id);
        if(!$orden_trabajo_digital){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo_digital->cantidad = $request->input('cantidad');
        $orden_trabajo_digital->orden_trabajo_id = $request->input('orden_trabajo_id');
        $orden_trabajo_digital->save();
        return $orden_trabajo_digital;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orden_trabajo_digital = OrdenTrabajoDigital::find($id);
        if(!$orden_trabajo_digital){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $orden_trabajo_digital->delete();
        return "OT digital eliminada";
    }
}
