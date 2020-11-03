<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FichaTecnico;
use Response;

class FichaTecnicoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichas = FichaTecnico::with("usuario", "tecnico")->get();
        return $fichas;
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
        $ficha_tecnico = new FichaTecnico;
        $ficha_tecnico->fecha_inicio = $request->input('fecha_inicio');
        $ficha_tecnico->fecha_fin = $request->input('fecha_fin');
        $ficha_tecnico->fecha = $request->input('fecha');
        $ficha_tecnico->hora = $request->input('hora');
        $ficha_tecnico->cantidad = $request->input('cantidad');
        $ficha_tecnico->usuario_id = $request->input('usuario_id');
        $ficha_tecnico->tecnico_id = $request->input('tecnico_id');
        $ficha_tecnico->save();
        return $ficha_tecnico;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha_tecnico = FichaTecnico::with("usuario", "tecnico")->find($id);
        if (!$ficha_tecnico) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $ficha_tecnico;
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
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        $ficha_tecnico = FichaTecnico::find($id);
        if(!$ficha_tecnico){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ficha_tecnico->fecha_inicio = $request->input('fecha_inicio');
        $ficha_tecnico->fecha_fin = $request->input('fecha_fin');
        $ficha_tecnico->fecha = $request->input('fecha');
        $ficha_tecnico->hora = $request->input('hora');
        $ficha_tecnico->cantidad = $request->input('cantidad');
        $ficha_tecnico->usuario_id = $request->input('usuario_id');
        $ficha_tecnico->tecnico_id = $request->input('tecnico_id');
        $ficha_tecnico->save();
        return $ficha_tecnico;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ficha_tecnico = FichaTecnico::find($id);
        if(!$ficha_tecnico){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ficha_tecnico->delete();
        return "Ficha Tecnico eliminado";
    }
}
