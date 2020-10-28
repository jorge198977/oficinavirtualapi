<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use Response;

class TipoDocumentoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_documentos = TipoDocumento::get();
        return $tipos_documentos;
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
            'tipo_documento' => 'required|unique:tipos_documentos'
        ]);
    
        $tipo_documento = new TipoDocumento;
        $tipo_documento->tipo_documento = $request->input('tipo_documento');
        $tipo_documento->save();
        return $tipo_documento;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_documento = TipoDocumento::find($id);
        if(!$tipo_documento){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        return $tipo_documento;
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
            'tipo_documento' => 'required'
        ]);
        $tipo_documento = TipoDocumento::find($id);
        if(!$tipo_documento){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_documento->tipo_documento = $request->input('tipo_documento');
        $tipo_documento->save();
        return $tipo_documento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_documento = TipoDocumento::find($id);
        if(!$tipo_documento){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $tipo_documento->delete();
        return "Tipo de usuario eliminado";
    }
}
