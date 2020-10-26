<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use Response;

class DireccionControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = Direccion::with("calle", "calle.poblacion", "calle.poblacion.sector.comuna")->get();
        return $direcciones;
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
        $direccion = new Direccion;
        $direccion->numero = $request->input('numero');
        $direccion->depto_casa = $request->input('depto_casa');
        $direccion->block = $request->input('block');
        $direccion->calle_id = $request->input('calle_id');
        $direccion->save();
        return $direccion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $direccion = Direccion::with("calle", "calle.poblacion", "calle.poblacion.sector.comuna")->find($id);
        if (!$direccion) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $direccion;
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

        $direccion = Direccion::find($id);
        if(!$direccion){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $direccion->numero = $request->input('numero');
        $direccion->depto_casa = $request->input('depto_casa');
        $direccion->block = $request->input('block');
        $direccion->calle_id = $request->input('calle_id');
        $direccion->save();
        return $direccion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccion = Direccion::find($id);
        if(!$direccion){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $direccion->delete();
        return "Direccion eliminada";
    }
}
