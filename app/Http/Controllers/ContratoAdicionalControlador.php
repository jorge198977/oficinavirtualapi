<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoAdicional;
use Response;

class ContratoAdicionalControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos_adicionales = ContratoAdicional::with("contrato.cliente", "servicio")->get();
        return $contatos_adicionales;
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
        $contrato_adicional = new ContratoAdicional;
        $contrato_adicional->cantidad = $request->input('cantidad');
        $contrato_adicional->valor = $request->input('valor');
        $contrato_adicional->valor_real = $request->input('valor_real');
        $contrato_adicional->contrato_id = $request->input('contrato_id');
        $contrato_adicional->servicio_id = $request->input('servicio_id');
        $contrato_adicional->save();
        return $contrato_adicional;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato_adicional = ContratoAdicional::with("contrato.cliente", "servicio")->find($id);
        if (!$contrato_adicional) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $contrato_adicional;
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
        $contrato_adicional = ContratoAdicional::find($id);
        if(!$contrato_adicional){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato_adicional->cantidad = $request->input('cantidad');
        $contrato_adicional->valor = $request->input('valor');
        $contrato_adicional->valor_real = $request->input('valor_real');
        $contrato_adicional->contrato_id = $request->input('contrato_id');
        $contrato_adicional->servicio_id = $request->input('servicio_id');
        $contrato_adicional->save();
        return $contrato_adicional;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato_adicional = ContratoAdicional::find($id);
        if(!$contrato_adicional){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato_adicional->delete();
        return "Contrato adicional eliminado";
    }
}
