<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Response;

class EmpresaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::get();
        return $empresas;
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
            'rut' => 'required|unique:empresas',
            'razon_social' => 'required|unique:empresas',
            'bolfolio' => 'required',
            'movbol' => 'required',
            'movfact' => 'required',
            'racorta' => 'required',
        ]);
    
        $empresa = new Empresa;
        $empresa->rut = $request->input('rut');
        $empresa->razon_social = $request->input('razon_social');
        $empresa->bolfolio = $request->input('bolfolio');
        $empresa->movbol = $request->input('movbol');
        $empresa->movfact = $request->input('movfact');
        $empresa->racorta = $request->input('racorta');
        $empresa->save();
        return $empresa;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        if(!$empresa){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $empresa;
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
            'rut' => 'required|unique:empresas',
            'razon_social' => 'required|unique:empresas',
            'bolfolio' => 'required',
            'movbol' => 'required',
            'movfact' => 'required',
            'racorta' => 'required',
        ]);
        $empresa = Empresa::find($id);
        if(!$empresa){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $empresa->rut = $request->input('rut');
        $empresa->razon_social = $request->input('razon_social');
        $empresa->bolfolio = $request->input('bolfolio');
        $empresa->movbol = $request->input('movbol');
        $empresa->movfact = $request->input('movfact');
        $empresa->racorta = $request->input('racorta');
        $empresa->save();
        return $empresa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        if(!$empresa){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $empresa->delete();
        return "Empresa eliminada";
    }
}
