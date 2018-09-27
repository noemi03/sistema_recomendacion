<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoRecomendacion;

class TipoRecomendaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoRecomendacion=TipoRecomendacion::all();
        return view('GestionTipoRecomendacion.tiporecomendaciones')->with(['tipoRecomendacion'=>$tipoRecomendacion ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  cargarTRecomendacion(){
         $tipoRecomendacion=TipoRecomendacion::all();
         return response()->json($tipoRecomendacion);
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
            'descripcion'=>'required'
            
    
        ]); 
             
        $tipoRecomendacionVar = new TipoRecomendacion();
        $tipoRecomendacionVar->descripcion = $request->descripcion;
            
            if ($tipoRecomendacionVar->save()) {

                return response()->json($tipoRecomendacionVar);
    
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
        $tipoRecomendacion=TipoRecomendacion::find($id);
        return response()->json($tipoRecomendacion);

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
            'descripcion'=>'required'
            
    
        ]); 
             
        $tipoRecomendacionVar =TipoRecomendacion::find($id);
        $tipoRecomendacionVar->descripcion = $request->descripcion;
            
            if ($tipoRecomendacionVar->save()) {
           
                return response()->json($tipoRecomendacionVar);
    
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

        $tipoRecomendacion=TipoRecomendacion::find($id);
        $tipoRecomendacion->delete();
    }
}
