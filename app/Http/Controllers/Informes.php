<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informe;
use storage;


class Informes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $informes=Informe::all();
        return view ('GestionInforme.informe')->with(['informes'=>$informes]);
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
         
        $informeVar= new Informe();
        $informeVar->fechaAprobacion = $request->fechaAprobacion;
        $informeVar->memorandoSolicitud = $request->memorandoSolicitud;
        $informeVar->temaExamen = $request->temaExamen;
        $informeVar->porcentajeCumplido= $request->porcentajeCumplido;
        $informeVar->observacion= $request->observacion;
        $informeVar->codigoInforme = $request->codigoInforme;
      


   
        $informeVar->save();
        return response()->json($informeVar);
          
    }

    public function actualizarInforme($id)
    {
        $informeVar = Informe::find($id);
        return response()->json($informeVar);
    }

    public function listarInforme()
    {
        $informeVar = Informe::all();
        return response()->json($informeVar);
    }
    

    public function buscar_Informe($tema='',$fecha='')
    {
        $informe =Informe::Where('temaExamen','like',"%$tema%")
                                      ->orwhere([
                                      ['fechaAprobacion','like',"%$fecha%"],
                                      ['temaExamen','like',"%$tema%"]
                                         ])
                                    ->get();

        return response()->json($informe);
    }
    
    public function buscar_Informev2($fecha='')
    {
        $informe =Informe::Where('fechaAprobacion','like',"%$fecha%")
                                        ->get();

         return response()->json($informe);
    }



    public function edit($id)
    {
          $informes=Informe::find($id);
        return view('GestionInforme.informe')->with(['edit' =>true,'informes'=>$informes]);
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
         


        $informeVar= Informe::find($id);
        $informeVar->fechaAprobacion = $request->fechaAprobacion;
        $informeVar->memorandoSolicitud = $request->memorandoSolicitud;
        $informeVar->temaExamen = $request->temaExamen;
        $informeVar->porcentajeCumplido= $request->porcentajeCumplido;
        $informeVar->observacion= $request->observacion;
        $informeVar->codigoInforme = $request->codigoInforme;
        
        $informeVar->save();

        return response()->json($informeVar);
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $informeVar = Informe::find($id);
        $informeVar->delete();
    }
}
