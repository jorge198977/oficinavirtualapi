<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPlan;
use Response;

class TipoPlanControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_planes = TipoPlan::with("servicio")->get();
        return $tipos_planes;
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
        $request->validate([
            'descripcion' => 'required',
            'servicio_id' => 'required'
        ]);
    
        $tipo_plan = new TipoPlan;
        $tipo_plan->descripcion = $request->input('descripcion');
        $tipo_plan->servicio_id = $request->input('servicio_id');
        $tipo_plan->save();
        return $tipo_plan;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_plan = TipoPlan::with("servicio")->find($id);
        if (!$tipo_plan) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $tipo_plan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $tipo_plan = TipoPlan::find($id);
        if (!$tipo_plan) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }

        $tipo_plan->descripcion = $request->input('descripcion');
        $tipo_plan->servicio_id = $request->input('servicio_id');
        $tipo_plan->save();

        return $tipo_plan;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_plan = TipoPlan::find($id);
        if (!$tipo_plan) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        $tipo_plan->delete();
        return "Tipo plan eliminado";
    }
}
