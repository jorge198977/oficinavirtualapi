<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comuna;
use Response;

class ComunaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunas = Comuna::get();
        return $comunas;
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
            'comuna' => 'required|unique:comunas'
        ]);
    
        $comuna = new Comuna;
        $comuna->comuna = $request->input('comuna');
        $comuna->save();
        return $comuna;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comuna = Comuna::find($id);
        if(!$comuna){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $comuna;
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
            'comuna' => 'required'
        ]);
        $comuna = Comuna::find($id);
        if(!$comuna){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $comuna->comuna = $request->input('comuna');
        $comuna->save();
        return $comuna;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comuna = Comuna::find($id);
        if(!$comuna){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $comuna->delete();
        return "Comuna eliminada";
    }
}
