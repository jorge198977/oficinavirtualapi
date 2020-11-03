<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaCredito;
use Response;

class NotaCreditoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas_creditos = NotaCredito::with("venta", "usuario")->get();
        return $notas_creditos;
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
        $nota_credito = new NotaCredito;
        $nota_credito->observacion = $request->input('observacion');
        $nota_credito->venta_id = $request->input('venta_id');
        $nota_credito->usuario_id = $request->input('usuario_id');
        $nota_credito->save();
        return $nota_credito;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota_credito = NotaCredito::with("venta", "usuario")->find($id);
        if (!$nota_credito) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $nota_credito;
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
            'observacion' => 'required'
        ]);
        $nota_credito = NotaCredito::find($id);
        if(!$nota_credito){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $nota_credito->observacion = $request->input('observacion');
        $nota_credito->venta_id = $request->input('venta_id');
        $nota_credito->usuario_id = $request->input('usuario_id');
        $nota_credito->save();
        return $nota_credito;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota_credito = NotaCredito::find($id);
        if(!$nota_credito){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $nota_credito->delete();
        return "NC eliminada";
    }
}
