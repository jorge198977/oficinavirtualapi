<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CajeroNumero;
use Response;

class CajeroNumeroControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cajeros_numeros = CajeroNumero::with("usuario")->get();
        return $cajeros_numeros;
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
        $cajero_numero = new CajeroNumero;
        $cajero_numero->fecha = $request->input('fecha');
        $cajero_numero->usuario_id = $request->input('usuario_id');
        $cajero_numero->save();
        return $cajero_numero;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cajero_numero = CajeroNumero::with("usuario")->find($id);
        if (!$cajero_numero) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $cajero_numero;
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
        $cajero_numero = CajeroNumero::find($id);
        if(!$cajero_numero){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cajero_numero->fecha = $request->input('fecha');
        $cajero_numero->usuario_id = $request->input('usuario_id');
        $cajero_numero->save();
        return $cajero_numero;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cajero_numero = CajeroNumero::find($id);
        if(!$cajero_numero){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cajero_numero->delete();
        return "Cajero Numero eliminado";
    }
}
