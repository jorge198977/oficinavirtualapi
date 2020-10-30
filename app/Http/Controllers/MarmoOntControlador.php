<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarmoOnt;
use Response;

class MarmoOntControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marmo_onts = MarmoOnt::get();
        return $marmo_onts;
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
            'marca' => 'required',
            'modelo' => 'required|unique:marmos_onts',
        ]);
    
        $marmo_ont = new MarmoOnt;
        $marmo_ont->marca = $request->input('marca');
        $marmo_ont->modelo = $request->input('modelo');
        $marmo_ont->CATV = $request->input('CATV');
        $marmo_ont->wireless = $request->input('wireless');
        $marmo_ont->wireless5 = $request->input('wireless5');
        $marmo_ont->save();
        return $marmo_ont;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marmo_ont = MarmoOnt::find($id);
        if(!$marmo_ont){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $marmo_ont;
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
        $marmo_ont = MarmoOnt::find($id);
        if(!$marmo_ont){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $marmo_ont->marca = $request->input('marca');
        $marmo_ont->modelo = $request->input('modelo');
        $marmo_ont->CATV = $request->input('CATV');
        $marmo_ont->wireless = $request->input('wireless');
        $marmo_ont->wireless5 = $request->input('wireless5');
        $marmo_ont->save();
        return $marmo_ont;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marmo_ont = MarmoOnt::find($id);
        if(!$marmo_ont){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $marmo_ont->delete();
        return "MarmoOnt eliminado";
    }
}
