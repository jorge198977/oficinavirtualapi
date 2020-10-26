<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sector;
use Response;

class SectorControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectores = Sector::with("comuna")->get();
        return $sectores;
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
            'sector' => 'required|unique:sectores'
        ]);
    
        $sector = new Sector;
        $sector->sector = $request->input('sector');
        $sector->comuna_id = $request->input('comuna_id');
        $sector->save();
        return $sector;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = Sector::with("comuna")->find($id);
        if (!$sector) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $sector;
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
            'sector' => 'required'
        ]);
        $sector = Sector::find($id);
        if(!$sector){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $sector->sector = $request->input('sector');
        $sector->comuna_id = $request->input('comuna_id');
        $sector->save();
        return $sector;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);
        if(!$sector){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $sector->delete();
        return "Sector eliminado";
    }
}
