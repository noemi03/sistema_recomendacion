<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;
use App\RecomendacionesDepartamento;
use Illuminate\Support\Facades\DB;

class Tareas extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarea =Tarea::with('RecomendacionesDepartamento')->get();
        $reco=RecomendacionesDepartamento::with('Tarea')->get();
        return view ('GestionTareas.tareas')->with(['reco'=>$reco,'tarea'=>$tarea]);
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
             
        $tareaVar= new Tarea();
        $tareaVar->descripcion= $request->descripcion;    
        $tareaVar->porcentajeCumplimiento= $request->porcentajeCumplimiento; 
        $tareaVar->porcentajeEquivalente= $request->porcentajeEquivalente;   
        $tareaVar->recomendacionesDepartamentoid=$request->recomendacionesDepartamentoid;
        $tareaVar->save();
        $tareaall=Tarea::with(['RDepartamento'])->find($tareaVar->id);
              return response()->json($tareaall);
         
           
    }


    /*FUNCIÓN PARA BUSCAR EL TAREA A ACTUALIZAR */
     public function preparactualizar($id){
      $tareaall=Tarea::with(['RDepartamento'])->find($id);
        return response()->json($tareaall);
     }

     /*FUNCIÓN PARA MOSTRAR TODOS LOS TAREAS*/
    public function listarTarea(){   
   
       $tareaall=Tarea::with(['RDepartamento'])->get();
         return response()->json($tareaall);
    }


    public function buscar_Tarea($busqueda='')
      {
          $tarea = Tarea::with(['RDepartamento'])->Where('descripcion','like',"%$busqueda%")
                                                      ->get();
  
          return response()->json($tarea);
      }
  
  


    public function edit($id)
    {
        $reco=RecomendacionesDepartamento::all();
        $tarea=Tarea::find($id);
        return view('GestionTareas.tareas')->with(['edit'=>true,'reco'=>$reco,'tarea'=>$tarea]);
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
          
             
        $tareaVar=Tarea::find($id);
        $tareaVar->descripcion= $request->descripcion; 
        $tareaVar->porcentajeCumplimiento= $request->porcentajeCumplimiento; 
        $tareaVar->porcentajeEquivalente= $request->porcentajeEquivalente;      
        $tareaVar->recomendacionesDepartamentoid= $request->recomendacionesDepartamentoid;
            
            if ($tareaVar->save()) {
            $tareaall=Tarea::with(['RDepartamento'])->find($tareaVar->id);
              return response()->json($tareaall);
    
            }else{
                return back()->with('errormsj', '¡Error al guardar los datos!');
    
            }
     
        
    }

    public function CargarDatos()
    {   

       $tareaall=Tarea::with(['RDepartamento'])->where('estado','activo')->get();
        return response()->json($tareaall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tareaall =Tarea::find($id);
        $tareaall->delete();
    }
}
