<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TipoUsuario;
use Response;


class TipoUsuarioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_usuarios = TipoUsuario::get();
        return $tipos_usuarios;
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
            'descripcion' => 'required|unique:tipos_usuarios'
        ]);
    
        $tipo_usuario = new TipoUsuario;
        $tipo_usuario->descripcion = $request->input('descripcion');
        $tipo_usuario->save();
        return $tipo_usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_usuario = TipoUsuario::find($id);
        if(!$tipo_usuario){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $tipo_usuario;
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
            'descripcion' => 'required'
        ]);
        $tipo_usuario = TipoUsuario::find($id);
        if(!$tipo_usuario){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_usuario->descripcion = $request->input('descripcion');
        $tipo_usuario->save();
        return $tipo_usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_usuario = TipoUsuario::find($id);
        if(!$tipo_usuario){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_usuario->delete();
        return "Tipo de usuario eliminado";
    }
}
