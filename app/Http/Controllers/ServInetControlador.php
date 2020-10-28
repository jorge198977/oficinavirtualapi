<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServInet;
use Response;

class ServInetControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serv_inets = ServInet::get();
        return $serv_inets;
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
            'descripcion' => 'required|unique:servinets',
            'valor' => 'required'
        ]);
    
        $serv_inet = new ServInet;
        $serv_inet->id = $request->input('id');
        $serv_inet->descripcion = $request->input('descripcion');
        $serv_inet->valor = $request->input('valor');
        $serv_inet->costo = $request->input('costo');
        $serv_inet->descuento = $request->input('descuento');
        $serv_inet->vigente = $request->input('vigente');
        $serv_inet->bajada = $request->input('bajada');
        $serv_inet->subida = $request->input('subida');
        $serv_inet->save();
        return $serv_inet;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serv_inet = ServInet::find($id);
        if(!$serv_inet){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $serv_inet;
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

        $serv_inet = ServInet::find($id);
        if(!$serv_inet){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $serv_inet->id = $request->input('id');
        $serv_inet->descripcion = $request->input('descripcion');
        $serv_inet->valor = $request->input('valor');
        $serv_inet->costo = $request->input('costo');
        $serv_inet->descuento = $request->input('descuento');
        $serv_inet->vigente = $request->input('vigente');
        $serv_inet->bajada = $request->input('bajada');
        $serv_inet->subida = $request->input('subida');
        $serv_inet->save();
        return $serv_inet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serv_inet = ServInet::find($id);
        if(!$serv_inet){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $serv_inet->delete();
        return "ServInet eliminado";
    }
}
