<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informe;
use App\TipoInforme;



class Informes extends Controller
{
    /**
     * Display a listing of the resource.k
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $tipoInforme= TipoInforme::with('Informe')->get();
        $informes= Informe::with('TipoInforme')->get(); 
        return view('GestionInforme.informe')->with(['informes'=>$informes,'tipoInforme'=>$tipoInforme ]);
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
        $informeVar->fechaLimite = $request->fechaLimite;
        $informeVar->memorandoSolicitud = $request->memorandoSolicitud;
        $informeVar->temaExamen = $request->temaExamen;
        $informeVar->porcentajeCumplido= $request->porcentajeCumplido;
        $informeVar->observacion= "SIN OBSERVACION";
        $informeVar->codigoInforme = $request->codigoInforme;
        $informeVar->estadoInforme = "SIN ASIGNACION";
        $informeVar->tipoInforme_id = $request->tipoInforme_id;

        if ($informeVar->save()) {
             $informeall=Informe::with(['TipoinformeV2'])->find($informeVar->id);
              return response()->json($informeall);
        } else {
            return back()->with('errormsj', '¡Error al guardar los datos!');
        }
        
    }

    public function actualizarInforme($id)
    {
        $informeall=Informe::with(['TipoinformeV2'])->find($id);
        return response()->json($informeall);

    }
  //mostrar
    public function listarInforme()
    {
        $informeall=Informe::with(['TipoinformeV2'])->get();
        return response()->json($informeall);
        
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
        $tipoInforme = TipoInforme::all();
        $informes = Informe::find($id);      
        return view('GestionInforme.informe')->with(['edit' => true,'informes'=>$informes,'tipoInforme'=>$tipoInforme]);
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
        $informeVar->fechaLimite = $request->fechaLimite;
        $informeVar->memorandoSolicitud = $request->memorandoSolicitud;
        $informeVar->temaExamen = $request->temaExamen;
        $informeVar->porcentajeCumplido= $request->porcentajeCumplido;
        $informeVar->observacion= $request->observacion;
        $informeVar->codigoInforme = $request->codigoInforme;
        $informeVar->estadoInforme = $request->estadoInforme;
        $informeVar->tipoInforme_id = $request->tipoInforme_id;

        if ($informeVar->save()) {
             $informeall=Informe::with(['TipoinformeV2'])->find($informeVar->id);
              return response()->json($informeall);
        } else {
            return back()->with('errormsj', '¡Error al guardar los datos!');
        }
            
        
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
    public function modificarInforme(Request $request)
    {
        $id=$request->id;
        $consulta=Informe::findOrFail($id);
        $consulta->estadoInforme=$request->estadoInforme;
        $consulta->observacion=$request->observacion;
        $consulta->update();

        return response()->json($consulta);
        
    }
}
