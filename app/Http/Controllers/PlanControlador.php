<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Response;

class PlanControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plan::with("tipo_plan")->get();
        return $planes;
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
        // $request->validate([
        //     'descripcion' => 'required',
        //     'fecha_inicio' => 'required',
        //     'fecha_fin' => 'required',
        //     'vigente' => 'required',
        //     'meses' => 'required',
        //     'tipo_plan_id' => 'required',
        // ]);
    
        $plan = new Plan;
        $plan->descripcion = $request->input('descripcion');
        $plan->fecha_inicio = $request->input('fecha_inicio');
        $plan->fecha_fin = $request->input('fecha_fin');
        $plan->meses = $request->input('meses');
        $plan->tipo_plan_id = $request->input('tipo_plan_id');
        $plan->save();
        return $plan;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = Plan::with("tipo_plan")->find($id);
        if (!$plan) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $plan;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
