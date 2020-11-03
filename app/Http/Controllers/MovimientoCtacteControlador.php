<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimientoCtacte;
use Response;

class MovimientoCtacteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos_ctactes = MovimientoCtacte::get();
        return $movimientos_ctactes;
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
            'descripcion' => 'required|unique:movimientos_ctactes'
        ]);
    
        $movimiento_ctacte = new MovimientoCtacte;
        $movimiento_ctacte->id = $request->input('id');
        $movimiento_ctacte->descripcion = $request->input('descripcion');
        $movimiento_ctacte->save();
        return $movimiento_ctacte;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento_ctacte = MovimientoCtacte::find($id);
        if(!$movimiento_ctacte){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $movimiento_ctacte;
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
        $movimiento_ctacte = MovimientoCtacte::find($id);
        if(!$movimiento_ctacte){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $movimiento_ctacte->id = $request->input('id');
        $movimiento_ctacte->descripcion = $request->input('descripcion');
        $movimiento_ctacte->save();
        return $movimiento_ctacte;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimiento_ctacte = MovimientoCtacte::find($id);
        if(!$movimiento_ctacte){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $movimiento_ctacte->delete();
        return "Movimiento eliminado";
    }
}
