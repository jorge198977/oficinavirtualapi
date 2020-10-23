<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Response;

class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();
        return $clientes;
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
            'rut' => 'required'
        ]);
    
        $cliente = new Cliente;
        $cliente->rut = $request->input('rut');
        $cliente->nombres = $request->input('nombres');
        $cliente->paterno = $request->input('paterno');
        $cliente->materno = $request->input('materno');
        $cliente->nacionalidad = $request->input('nacionalidad');
        $cliente->telefono1 = $request->input('telefono1');
        $cliente->telefono2 = $request->input('telefono2');
        $cliente->email = $request->input('email');
        $cliente->empresa = $request->input('empresa');
        $cliente->direccion_comercial = $request->input('direccion_comercial');
        $cliente->telefono_comercial1 = $request->input('telefono_comercial1');
        $cliente->telefono_comercial2 = $request->input('telefono_comercial2');
        $cliente->email_comercial = $request->input('email_comercial');
        $cliente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $cliente->sexo = $request->input('sexo');
        $cliente->banco = $request->input('banco');
        $cliente->ctacte_banco = $request->input('ctacte_banco');
        $cliente->tipo_tarjeta = $request->input('tipo_tarjeta');
        $cliente->numero_tarjeta = $request->input('numero_tarjeta');
        $cliente->tipo_cliente = $request->input('tipo_cliente');
        $cliente->giro = $request->input('giro');
        $cliente->save();
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $cliente;
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
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }

        $cliente->rut = $request->input('rut');
        $cliente->nombres = $request->input('nombres');
        $cliente->paterno = $request->input('paterno');
        $cliente->materno = $request->input('materno');
        $cliente->nacionalidad = $request->input('nacionalidad');
        $cliente->telefono1 = $request->input('telefono1');
        $cliente->telefono2 = $request->input('telefono2');
        $cliente->email = $request->input('email');
        $cliente->empresa = $request->input('empresa');
        $cliente->direccion_comercial = $request->input('direccion_comercial');
        $cliente->telefono_comercial1 = $request->input('telefono_comercial1');
        $cliente->telefono_comercial2 = $request->input('telefono_comercial2');
        $cliente->email_comercial = $request->input('email_comercial');
        $cliente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $cliente->sexo = $request->input('sexo');
        $cliente->banco = $request->input('banco');
        $cliente->ctacte_banco = $request->input('ctacte_banco');
        $cliente->tipo_tarjeta = $request->input('tipo_tarjeta');
        $cliente->numero_tarjeta = $request->input('numero_tarjeta');
        $cliente->tipo_cliente = $request->input('tipo_cliente');
        $cliente->giro = $request->input('giro');
        $cliente->save();

        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        $cliente->delete();
        return "Cliente eliminado";
    }
}
