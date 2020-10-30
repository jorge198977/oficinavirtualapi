<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmMac;
use Response;

class CmMacControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cm_macs = CmMac::with("serv_inet", "marmo_cm")->get();
        return $cm_macs;
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
        $cm_mac = new CmMac;
        $cm_mac->id = $request->input('id');
        $cm_mac->cm = $request->input('cm');
        $cm_mac->servinet_id = $request->input('servinet_id');
        $cm_mac->marmocm_id = $request->input('marmocm_id');
        $cm_mac->save();
        return $cm_mac;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cm_mac = CmMac::with("serv_inet", "marmo_cm")->find($id);
        if (!$cm_mac) {
            return Response::json([
                'response' => 'Elemento no encontrado',
            ], 400);
        }
        return $cm_mac;
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
        $cm_mac = CmMac::find($id);
        if(!$cm_mac){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cm_mac->id = $request->input('id');
        $cm_mac->cm = $request->input('cm');
        $cm_mac->servinet_id = $request->input('servinet_id');
        $cm_mac->marmocm_id = $request->input('marmocm_id');
        $cm_mac->save();
        return $cm_mac;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cm_mac = CmMac::find($id);
        if(!$cm_mac){
            return Response::json([
                'response' => 'Elemento no encontrado'
            ], 400);
        }
        $cm_mac->delete();
        return "CMMAC eliminado";
    }
}
