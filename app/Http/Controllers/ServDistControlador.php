<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServDist;
use Response;

class ServDistControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serv_dists = ServDist::get();
        return $serv_dists;
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
            'servicio' => 'required|unique:servdists'
        ]);
    
        $serv_dist = new ServDist;
        $serv_dist->servicio = $request->input('servicio');
        $serv_dist->save();
        return $serv_dist;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serv_dist = ServDist::find($id);
        if(!$serv_dist){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $serv_dist;
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
            'servicio' => 'required'
        ]);
        $serv_dist = ServDist::find($id);
        if(!$serv_dist){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $serv_dist->servicio = $request->input('servicio');
        $serv_dist->save();
        return $serv_dist;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serv_dist = ServDist::find($id);
        if(!$serv_dist){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $serv_dist->delete();
        return "ServDist eliminado";
    }
}
