<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poblacion;
use Response;

class PoblacionControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poblaciones = Poblacion::with("sector", "sector.comuna")->get();
        return $poblaciones;
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
        //     'poblacion' => 'required|unique:poblaciones'
        // ]);
    
        $poblacion = new Poblacion;
        $poblacion->poblacion = $request->input('poblacion');
        $poblacion->sector_id = $request->input('sector_id');
        $poblacion->save();
        return $poblacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poblacion = Poblacion::with("sector", "sector.comuna")->find($id);
        if (!$poblacion) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $poblacion;
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
            'poblacion' => 'required'
        ]);
        $poblacion = Poblacion::find($id);
        if(!$poblacion){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $poblacion->poblacion = $request->input('poblacion');
        $poblacion->sector_id = $request->input('sector_id');
        $poblacion->save();
        return $poblacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poblacion = Poblacion::find($id);
        if(!$poblacion){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $poblacion->delete();
        return "Población eliminada";
    }
}
