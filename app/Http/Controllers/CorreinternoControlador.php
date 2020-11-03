<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Correinterno;
use Response;

class CorreinternoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correinternos = Correinterno::with("venta.contrato.cliente")->get();
        return $correinternos;
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
        $correinterno = new Correinterno;
        $correinterno->ndocumento = $request->input('ndocumento');
        $correinterno->nulo = $request->input('nulo');
        $correinterno->venta_id = $request->input('venta_id');
        $correinterno->save();
        return $correinterno;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $correinterno = Correinterno::with("venta.contrato.cliente")->find($id);
        if (!$correinterno) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $correinterno;
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
            'ndocumento' => 'required'
        ]);
        $correinterno = Correinterno::find($id);
        if(!$correinterno){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $correinterno->ndocumento = $request->input('ndocumento');
        $correinterno->nulo = $request->input('nulo');
        $correinterno->venta_id = $request->input('venta_id');
        $correinterno->save();
        return $correinterno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $correinterno = Correinterno::find($id);
        if(!$correinterno){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $correinterno->delete();
        return "CorreInterno eliminada";
    }
}
