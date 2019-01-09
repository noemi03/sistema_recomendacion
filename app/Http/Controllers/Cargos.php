<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cargo;

class Cargos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $cargos=Cargo::all();
         return view('GestionCargos.Cargos')->with(['cargos'=>$cargos]); 
        
    }


    public function  cargarCargos(){
        $cargos=Cargo::all();
        return response()->json($cargos);
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
        
        $this->validate($request,[
            'descripcionCargo'=>'required'
                
        ]);

        $cargos = new Cargo();
        $cargos->descripcionCargo = $request->descripcionCargo;
            
            if ($cargos->save()) {

                return response()->json($cargos);
    
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
        $cargos=Cargo::find($id);
        return response()->json($cargos);
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
            'descripcionCargo'=>'required'
            
    
        ]); 
             
        $cargos =Cargo::find($id);
        $cargos->descripcionCargo = $request->descripcionCargo;
            
            if ($cargos->save()) {
           
                return response()->json($cargos);
    
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
        $cargos=Cargo::find($id);
        $cargos->delete();
    }
}
