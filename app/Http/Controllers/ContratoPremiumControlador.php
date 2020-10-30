<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContratoPremium;
use Response;

class ContratoPremiumControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos_premiums = ContratoPremium::with("contrato", "servicio")->get();
        return $contratos_premiums;
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
        $contrato_premium = new ContratoPremium;
        $contrato_premium->valor = $request->input('valor');
        $contrato_premium->contrato_id = $request->input('contrato_id');
        $contrato_premium->servicio_id = $request->input('servicio_id');
        $contrato_premium->save();
        return $contrato_premium;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato_premium = ContratoPremium::with("contrato", "servicio")->find($id);
        if (!$contrato_premium) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $contrato_premium;
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
            'valor' => 'required'
        ]);
        $contrato_premium = ContratoPremium::find($id);
        if(!$contrato_premium){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }

        $contrato_premium->valor = $request->input('valor');
        $contrato_premium->contrato_id = $request->input('contrato_id');
        $contrato_premium->servicio_id = $request->input('servicio_id');
        $contrato_premium->save();
        return $contrato_premium;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato_premium = ContratoPremium::find($id);
        if(!$contrato_premium){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $contrato_premium->delete();
        return "Contrato Premium eliminado";
    }
}
