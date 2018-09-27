<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarea;
use App\Actividad;
use Illuminate\Support\Facades\DB;

class Actividades extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarea = Tarea::with('Actividades')->get();
        $actividad=Actividad::with('Tareas')->get();
      
       return view ('GestionActividad.actividades')->with(['actividad'=>$actividad,'tarea'=>$tarea]);
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
         
            
        $actividadVar= new Actividad();
        $actividadVar->descripcionA= $request->descripcionA;      
        $actividadVar->fecha= $request->fecha;
        $actividadVar->tarea_id = $request->tarea_id;
        
           
           $actividadVar->save();
            
            $actividadall=Actividad::with(['TareasV2'])->find($actividadVar->id);
            return response()->json($actividadall);
    
            // }else{
            //     return back()->with('errormsj', '¡Error al guardar los datos!');
    
            // }
    }


    /*FUNCIÓN PARA BUSCAR EL ACTIVIDAD A ACTUALIZAR */
     public function preparactualizar($id){

     $actividadall=Actividad::with(['TareasV2'])->find($id);
        return response()->json($actividadall);
     }

     /*FUNCIÓN PARA MOSTRAR TODOS LOS TAREAS*/
    public function listarActividad(){   
   
       $actividadall=Actividad::with(['TareasV2'])->get();
         return response()->json($actividadall);
      }


    

    
  
    public function edit($id)
    {
        $tarea = Tarea::all();
        $actividad = Actividad::find($id);
  
        return view('GestionActividad.actividades')->with(['edit' => true, 'actividad' =>$actividad, 'tarea' =>$tarea]);
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
    
        
        $actividadVar= Actividad::find($id);
        $actividadVar->descripcionA= $request->descripcionA;
        $actividadVar->fecha = $request->fecha;
        $actividadVar->tarea_id = $request->tarea_id;
            
            if ($actividadVar->save()) {
                $actividadall=Actividad::with(['TareasV2'])->find($actividadVar->id);
                return response()->json($actividadall);
    
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
        $actividadall =Actividad::find($id);
        $actividadall->delete();
    }

    public function buscar_Actividad($descripcion='',$fecha='')
    {
        $actividad =    Actividad::with(['TareasV2'])->Where('descripcionA','like',"%$descripcion%")
                                                     ->orwhere([
                                                        ['fecha','like',"%$fecha%"],
                                                        ['descripcionA','like',"%$descripcion%"]
                                                        ])
                                                    ->get();

        return response()->json($actividad);
    }
    
    public function buscar_Actividad2($fecha='')
    {
        $actividad =    Actividad::with(['TareasV2'])->Where('fecha','like',"%$fecha%")
                                                    ->get();

        return response()->json($actividad);
    }


 

}
  