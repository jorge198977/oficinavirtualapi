<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crea230;
use Response;

class Crea230Controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crea_230s = Crea230::with("contrato", "carga_adicional")->get();
        return $crea_230s;
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
        $crea_230 = new Crea230;
        $crea_230->mes = $request->input('mes');
        $crea_230->anio = $request->input('anio');
        $crea_230->cable = $request->input('cable');
        $crea_230->internet = $request->input('internet');
        $crea_230->premium = $request->input('premium');
        $crea_230->boca = $request->input('boca');
        $crea_230->descuento = $request->input('descuento');
        $crea_230->valor_230 = $request->input('valor_230');
        $crea_230->contrato_id = $request->input('contrato_id');
        $crea_230->carga_adicional_id = $request->input('carga_adicional_id');
        $crea_230->save();
        return $crea_230;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crea_230 = Crea230::with("contrato", "carga_adicional")->find($id);
        if (!$crea_230) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $crea_230;
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
        $crea_230 = Crea230::find($id);
        if(!$crea_230){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $crea_230->mes = $request->input('mes');
        $crea_230->anio = $request->input('anio');
        $crea_230->cable = $request->input('cable');
        $crea_230->internet = $request->input('internet');
        $crea_230->premium = $request->input('premium');
        $crea_230->boca = $request->input('boca');
        $crea_230->descuento = $request->input('descuento');
        $crea_230->valor_230 = $request->input('valor_230');
        $crea_230->contrato_id = $request->input('contrato_id');
        $crea_230->carga_adicional_id = $request->input('carga_adicional_id');
        $crea_230->save();
        return $crea_230;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crea_230 = Crea230::find($id);
        if(!$crea_230){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $crea_230->delete();
        return "Crea 230 eliminado";
    }
}
