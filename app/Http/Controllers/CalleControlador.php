<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calle;
use Response;

class CalleControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calles = Calle::with("poblacion", "poblacion.sector", "poblacion.sector.comuna")->get();
        return $calles;
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
        $calle = new Calle;
        $calle->calle = $request->input('calle');
        $calle->poblacion_id = $request->input('poblacion_id');
        $calle->save();
        return $calle;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calle = Calle::with("poblacion", "poblacion.sector", "poblacion.sector.comuna")->find($id);
        if (!$calle) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $calle;
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
            'calle' => 'required'
        ]);
        $calle = Calle::find($id);
        if(!$calle){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $calle->calle = $request->input('calle');
        $calle->poblacion_id = $request->input('poblacion_id');
        $calle->save();
        return $calle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calle = Calle::find($id);
        if(!$calle){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $calle->delete();
        return "Calle eliminada";
    }
}
