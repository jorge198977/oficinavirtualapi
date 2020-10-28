<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoInet;
use Response;

class ContratoInetControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos_intes = ContratoInet::with("contrato.cliente", "servinet")->get();
        return $contatos_intes;
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
        $contrato_inet = new ContratoInet;
        $contrato_inet->contrato_id = $request->input('contrato_id');
        $contrato_inet->servinet_id = $request->input('servinet_id');
        $contrato_inet->save();
        return $contrato_inet;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato_inet = ContratoInet::with("contrato.cliente", "servinet")->find($id);
        if (!$contrato_inet) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $contrato_inet;
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
        $contrato_inet = ContratoInet::find($id);
        if(!$contrato_inet){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato_inet->contrato_id = $request->input('contrato_id');
        $contrato_inet->servinet_id = $request->input('servinet_id');
        $contrato_inet->save();
        return $contrato_inet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato_inet = ContratoInet::find($id);
        if(!$contrato_inet){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato_inet->delete();
        return "Contrato inet eliminado";
    }
}
