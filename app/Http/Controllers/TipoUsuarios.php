<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoUsuario;
class TipoUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo=TipoUsuario::all();
        return view('GestionTipoUsuarios.tipousuario')->with(['tipo'=> $tipo ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  cargarTipoUsuario(){
         $tipo=TipoUsuario::all();
         return response()->json($tipo);
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
             
             $tipoVar = new TipoUsuario();
             $tipoVar->descripcion= $request->descripcion;
            
            if ($tipoVar->save()) {
                return response()->json($tipoVar);
    
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
        $tipo=TipoUsuario::find($id);
        return response()->json($tipo);
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
             
           $tipoVar =TipoUsuario::find($id);
             $tipoVar->descripcion = $request->descripcion;
            
            if (  $tipoVar->save()) {
              return response()->json($tipoVar);
    
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
        $tipoVar =TipoUsuario::find($id);
        $tipoVar->delete();
    }
    
}
