<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecomendacionUsuario;
use App\Tarea;
class Tareas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas= Tarea::with('RecomendacionesUsuarios')->get();
        $recomendacionesUsuarios= RecomendacionUsuario::with('Tareas')->get(); 
        return view('GestionTareas.tareas')->with(['recomendacionesUsuarios'=>$recomendacionesUsuarios,
        'tareas'=>$tareas ]);
   
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
        $tareaVar= new Tarea();
        $tareaVar->descripcionTarea= $request->descripcionTarea;      
        $tareaVar->porcentajeCumplimientotarea= $request->porcentajeCumplimientotarea;
        $tareaVar->estadoTarea= $request->estadoTarea;      
        $tareaVar->fechaCreacion= $request->fechaCreacion;      
        $tareaVar->fecha= $request->fecha;
        $tareaVar->recomendacionesusuarios_id = $request->recomendacionesusuarios_id;
                   
           $tareaVar->save();
            
            $tareaall=Tarea::with(['RecomendacionesUsuariosV2'])->find($tareaVar->id);
            return response()->json($tareaall);
    }

    
    public function preparactualizar($id){

        $tareaall=Tarea::with(['RecomendacionesUsuariosV2'])->find($id);
           return response()->json($tareaall);
        }
    
        /*FUNCIÓN PARA MOSTRAR TODOS LOS TAREAS*/
       public function listarTarea(){   
      
          $tareaall=Tarea::with(['RecomendacionesUsuariosV2'])->get();
            return response()->json($tareaall);
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
        $tarea = Tarea::all();
        $recomendacionesUsuarios = RecomendacionUsuario::find($id);
  
        return view('GestionTareas.tareas')->with(['edit' => true, 'recomendacionesUsuarios' =>$recomendacionesUsuarios,
         'tarea' =>$tarea]);
    
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
        $tareaVar->descripcionTarea= $request->descripcionTarea;      
        $tareaVar->porcentajeCumplimientotarea= $request->porcentajeCumplimientotarea;
        $tareaVar->estadoTarea= $request->estadoTarea;      
        $tareaVar->fechaCreacion= $request->fechaCreacion;      
        $tareaVar->fecha= $request->fecha;
        $tareaVar->recomendacionesusuarios_id = $request->recomendacionesusuarios_id;
        
           
           $tareaVar->save();
            
            $tareaall=Tarea::with(['RecomendacionesUsuariosV2'])->find($tareaVar->id);
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
