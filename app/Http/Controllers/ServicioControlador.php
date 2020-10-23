<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use Response;

class ServicioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::get();
        return $servicios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'id' => 'required',
            'descripcion' => 'required',
            'valor' => 'required',
            'unica_vez' => 'required'
        ]);
    
        $servicio = new Servicio;
        $servicio->id = $request->input('id');
        $servicio->descripcion = $request->input('descripcion');
        $servicio->valor = $request->input('valor');
        $servicio->unica_vez = $request->input('unica_vez');
        $servicio->save();
        return $servicio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }

        $servicio->descripcion = $request->input('descripcion');
        $servicio->valor = $request->input('valor');
        $servicio->unica_vez = $request->input('unica_vez');
        $servicio->save();

        return $servicio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        $servicio->delete();
        return "Servicio eliminado";
    }
}
