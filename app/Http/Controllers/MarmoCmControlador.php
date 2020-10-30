<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarmoCm;
use Response;

class MarmoCmControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marmo_cms = MarmoCm::get();
        return $marmo_cms;    
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
            'modelo' => 'required|unique:marmocms',
        ]);
    
        $marmo_cm = new MarmoCm;
        $marmo_cm->marca = $request->input('marca');
        $marmo_cm->modelo = $request->input('modelo');
        $marmo_cm->tipo = $request->input('tipo');
        $marmo_cm->docsis = $request->input('docsis');
        $marmo_cm->url = $request->input('url');
        $marmo_cm->save();
        return $marmo_cm;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marmo_cm = MarmoCm::find($id);
        if(!$marmo_cm){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $marmo_cm;
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

        $marmo_cm = MarmoCm::find($id);
        if(!$marmo_cm){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $marmo_cm->marca = $request->input('marca');
        $marmo_cm->modelo = $request->input('modelo');
        $marmo_cm->tipo = $request->input('tipo');
        $marmo_cm->docsis = $request->input('docsis');
        $marmo_cm->url = $request->input('url');
        $marmo_cm->save();
        return $marmo_cm;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marmo_cm = MarmoCm::find($id);
        if(!$marmo_cm){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $marmo_cm->delete();
        return "MarmoCm eliminado";
    }
}
