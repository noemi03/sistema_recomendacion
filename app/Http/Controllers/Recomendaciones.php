<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtema;
use App\Usuario;
use App\Recomendacion;
use Illuminate\Support\Facades\DB;

class Recomendaciones extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recomendaciones =Recomendacion::with('subTemas')->get();
        $subtemas=Subtema::with('Recomendacion')->get();
        return view ('GestionRecomendaciones.recomendaciones')->with(['subtemas'=>$subtemas,
        'recomendaciones'=>$recomendaciones]);
    } 
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             
        $recomendacionesVar= new Recomendacion();
        $recomendacionesVar->descripcionRecomendacion= $request->descripcionRecomendacion;    
        $recomendacionesVar->porcentajeCumplimiento= $request->porcentajeCumplimiento; 
        $recomendacionesVar->estadoRecomendacion= $request->estadoRecomendacion;   
        $recomendacionesVar->subtema_id=$request->subtema_id;     
        $recomendacionesVar->save();

        $recomendacionesall=Recomendacion::with(['subtemasV2'])->find($recomendacionesVar->id);
              return response()->json($recomendacionesall);
         
               }

                        
    /*FUNCIÓN PARA BUSCAR EL TAREA A ACTUALIZAR */
     public function preparactualizar($id){
      $recomendacionesall=Recomendacion::with(['subtemasV2'])->find($id);
        return response()->json($recomendacionesall);
     }

     /*FUNCIÓN PARA MOSTRAR TODOS LOS TAREAS*/
    public function listarRecomendaciones(){   
   
       $recomendacionesall=Recomendacion::with(['subtemasV2'])->get();
         return response()->json($recomendacionesall);
    }


    
    public function edit($id)
    {
        $subtemas=Subtema::all();
        $recomendaciones=Recomendacion::find($id);
        return view('GestionRecomendaciones.recomendaciones')->with(['edit'=>true,'subtemas'=>$subtemas,
        'recomendaciones'=>$recomendaciones]);
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
                      
        $recomendacionesVar=Recomendacion::find($id);        
        $recomendacionesVar->descripcionRecomendacion= $request->descripcionRecomendacion;    
        $recomendacionesVar->porcentajeCumplimiento= $request->porcentajeCumplimiento; 
        $recomendacionesVar->estadoRecomendacion= $request->estadoRecomendacion;   
        $recomendacionesVar->subtema_id=$request->subtema_id;

            if ($recomendacionesVar->save()) {
            $recomendacionesall=Recomendacion::with(['subtemasV2'])->find($recomendacionesVar->id);
              return response()->json($recomendacionesall);
    
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
    {   $recomendacionesall =Recomendacion::find($id);
        $recomendacionesall->delete();
    }
}
