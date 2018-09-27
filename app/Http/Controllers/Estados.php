<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;

class Estados extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado=Estado::all();
        return view('GestionEstado.estado')->with(['estado'=>$estado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function  cargarEstado(){
       $estado=Estado::all();
     return response()->json($estado);
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
             
        $estadoVar= new Estado();
        $estadoVar->descripcion = $request->descripcion;
            
            if ($estadoVar->save()) {
                
                return response()->json($estadoVar);
    
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

        $estado=Estado::find($id);
        return response()->json($estado);
    
        //return view ('GestionEstado.estado')->with(['edit'=>true,'estado'=>$estado]);
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
             
        $estadoVar =Estado::find($id);
        $estadoVar ->descripcion = $request->descripcion;
            
            if ($estadoVar->save()) {
               return response()->json($estadoVar);
    
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
        $estado=Estado::find($id);
        $estado->delete();
      
    }
}
