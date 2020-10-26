<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoOt;
use Response;

class TipoOtControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_ots = TipoOt::with("servs_dists")->get();
        return $tipos_ots;
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
        $tipo_ot = new TipoOt;
        $tipo_ot->nombre = $request->input('nombre');
        $tipo_ot->servdist_id = $request->input('servdist_id');
        $tipo_ot->revisa = $request->input('revisa');
        $tipo_ot->save();
        return $tipo_ot;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_ot = TipoOt::with("servs_dists")->find($id);
        if (!$tipo_ot) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $tipo_ot;
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
            'nombre' => 'required'
        ]);
        $tipo_ot = TipoOt::find($id);
        if(!$tipo_ot){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_ot->nombre = $request->input('nombre');
        $tipo_ot->servdist_id = $request->input('servdist_id');
        $tipo_ot->revisa = $request->input('revisa');
        $tipo_ot->save();
        return $tipo_ot;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_ot = TipoOt::find($id);
        if(!$tipo_ot){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_ot->delete();
        return "Tipo OT eliminado";
    }
}
