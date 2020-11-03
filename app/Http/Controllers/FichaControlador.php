<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use Response;

class FichaControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichas = Ficha::with("orden_trabajo.contrato")->get();
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
        $ficha = new Ficha;
        $ficha->codigo = $request->input('codigo');
        $ficha->num = $request->input('num');
        $ficha->ficha = $request->input('ficha');
        $ficha->orden_trabajo_id = $request->input('orden_trabajo_id');
        $ficha->save();
        return $ficha;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha = Ficha::with("orden_trabajo.contrato")->find($id);
        if (!$ficha) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $ficha;
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
            'ficha' => 'required'
        ]);
        $ficha = Ficha::find($id);
        if(!$ficha){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ficha->codigo = $request->input('codigo');
        $ficha->num = $request->input('num');
        $ficha->ficha = $request->input('ficha');
        $ficha->orden_trabajo_id = $request->input('orden_trabajo_id');
        $ficha->save();
        return $ficha;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ficha = Ficha::find($id);
        if(!$ficha){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $ficha->delete();
        return "Ficha eliminada";
    }
}
