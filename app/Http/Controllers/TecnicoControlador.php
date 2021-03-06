<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tecnico;
use Response;

class TecnicoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnicos = Tecnico::with("estado_tecnico")->get();
        return $tecnicos;
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
        $tecnico = new Tecnico;
        $tecnico->nombre = $request->input('nombre');
        $tecnico->externo = $request->input('externo');
        $tecnico->usuario = $request->input('usuario');
        $tecnico->clave = bcrypt($request->input('clave'));
        $tecnico->email = $request->input('email');
        $tecnico->rut = $request->input('rut');
        $tecnico->FTTH = $request->input('FTTH');
        $tecnico->estado_tecnico_id = $request->input('estado_tecnico_id');
        $tecnico->save();
        return $tecnico;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnico = Tecnico::with("estado_tecnico")->find($id);
        if (!$tecnico) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $tecnico;
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
        $tecnico = Tecnico::find($id);
        if(!$tecnico){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tecnico->nombre = $request->input('nombre');
        $tecnico->externo = $request->input('externo');
        $tecnico->usuario = $request->input('usuario');
        $tecnico->clave = bcrypt($request->input('clave'));
        $tecnico->email = $request->input('email');
        $tecnico->rut = $request->input('rut');
        $tecnico->FTTH = $request->input('FTTH');
        $tecnico->estado_tecnico_id = $request->input('estado_tecnico_id');
        $tecnico->save();
        return $tecnico;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tecnico = Tecnico::find($id);
        if(!$tecnico){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tecnico->delete();
        return "Tecnico eliminado";
    }
}
