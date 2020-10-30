<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormaPago;
use Response;

class FormaPagoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formas_pagos = FormaPago::get();
        return $formas_pagos;
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
            'descripcion' => 'required|unique:formas_pagos'
        ]);
    
        $forma_pago = new FormaPago;
        $forma_pago->descripcion = $request->input('descripcion');
        $forma_pago->tipo = $request->input('tipo');
        $forma_pago->operacion = $request->input('operacion');
        $forma_pago->codbanco = $request->input('codbanco');
        $forma_pago->save();
        return $forma_pago;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forma_pago = FormaPago::find($id);
        if(!$forma_pago){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $forma_pago;
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
            'descripcion' => 'required'
        ]);
        $forma_pago = FormaPago::find($id);
        if(!$forma_pago){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $forma_pago->descripcion = $request->input('descripcion');
        $forma_pago->tipo = $request->input('tipo');
        $forma_pago->operacion = $request->input('operacion');
        $forma_pago->codbanco = $request->input('codbanco');
        $forma_pago->save();
        return $forma_pago;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forma_pago = FormaPago::find($id);
        if(!$forma_pago){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $forma_pago->delete();
        return "Forma pago eliminado";
    }
}
