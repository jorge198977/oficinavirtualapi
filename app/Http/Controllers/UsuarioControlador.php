<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Response;

class UsuarioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::get();
        return $usuarios;
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
            'usuario' => 'required'
        ]);
    
        $usuario = new User;
        $usuario->usuario = $request->input('usuario');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->rut = $request->input('rut');
        $usuario->nombre = $request->input('nombre');
        $usuario->administrador = $request->input('administrador');
        $usuario->boleta = $request->input('boleta');
        $usuario->vigente = $request->input('vigente');
        $usuario->boleta1 = $request->input('boleta1');
        $usuario->boleta2 = $request->input('boleta2');
        $usuario->boleta3 = $request->input('boleta3');
        $usuario->root = $request->input('root');
        $usuario->externo = $request->input('externo');
        $usuario->caja = $request->input('caja');
        $usuario->boleta4 = $request->input('boleta4');
        $usuario->email = $request->input('email');
        $usuario->tipo_usuario_id = $request->input('tipo_usuario_id');
        $usuario->save();
        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::with("tipo_usuario")->find($id);
        if (!$usuario) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $usuario;
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
        $usuario = User::find($id);
        if (!$usuario) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }

        $usuario->usuario = $request->input('usuario');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->rut = $request->input('rut');
        $usuario->nombre = $request->input('nombre');
        $usuario->administrador = $request->input('administrador');
        $usuario->boleta = $request->input('boleta');
        $usuario->vigente = $request->input('vigente');
        $usuario->boleta1 = $request->input('boleta1');
        $usuario->boleta2 = $request->input('boleta2');
        $usuario->boleta3 = $request->input('boleta3');
        $usuario->root = $request->input('root');
        $usuario->externo = $request->input('externo');
        $usuario->caja = $request->input('caja');
        $usuario->boleta4 = $request->input('boleta4');
        $usuario->email = $request->input('email');
        $usuario->tipo_usuario_id = $request->input('tipo_usuario_id');
        $usuario->save();

        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        $usuario->delete();
        return "Usuario eliminado";
    }
}
