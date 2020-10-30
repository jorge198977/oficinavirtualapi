<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OntSerie;
use Response;

class OntSerieControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onts_series = OntSerie::with("marmo_ont")->get();
        return $onts_series;
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
        $ont_serie = new OntSerie;
        $ont_serie->serie = $request->input('serie');
        $ont_serie->nombre = $request->input('nombre');
        $ont_serie->estado = $request->input('estado');
        $ont_serie->marmo_ont_id = $request->input('marmo_ont_id');
        $ont_serie->save();
        return $ont_serie;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ont_serie = OntSerie::with("marmo_ont")->find($id);
        if (!$ont_serie) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $ont_serie;
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
            'serie' => 'required'
        ]);
        $ont_serie = OntSerie::find($id);
        if(!$ont_serie){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ont_serie->serie = $request->input('serie');
        $ont_serie->nombre = $request->input('nombre');
        $ont_serie->estado = $request->input('estado');
        $ont_serie->marmo_ont_id = $request->input('marmo_ont_id');
        $ont_serie->save();
        return $ont_serie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ont_serie = OntSerie::find($id);
        if(!$ont_serie){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ont_serie->delete();
        return "OntSerie eliminada";
    }
}
