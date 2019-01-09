<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoInforme;

class TipoInformes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoinforme=TipoInforme::all();
        return view('GestionTipoInforme.tipoinformes')->with(['tipoinforme'=>$tipoinforme]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  cargarTInforme(){
         $tipoinforme=TipoInforme::all();
         return response()->json($tipoinforme);
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tipoInforme'=>'required'
            
    
        ]); 
             
        $tipoInformeVar = new TipoInforme();
        $tipoInformeVar->tipoInforme= $request->tipoInforme;
            
            if ($tipoInformeVar->save()) {

                return response()->json($tipoInformeVar);
    
            }else{
                return back()->with('errormsj', '¡Error al guardar los datos!');
    
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoinforme=TipoInforme::find($id);
        return response()->json($tipoinforme);

        //return view ('GestionTipoRecomendacion.tiporecomendaciones')->with(['edit'=>true,'tipoRecomendacion'=>$tipoRecomendacion]);
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
        $this->validate($request,[
            'tipoInforme'=>'required'
            
    
        ]); 
             
        $tipoInformeVar =TipoInforme::find($id);
        $tipoInformeVar->tipoInforme = $request->tipoInforme;
            
            if ($tipoInformeVar->save()) {
           
                return response()->json($tipoInformeVar);
    
            }else{
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

        $tipoinforme=TipoInforme::find($id);
        $tipoinforme->delete();
    }

    
}
