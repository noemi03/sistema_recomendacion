<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avance;
use App\Estado;
use App\Actividad;
use Illuminate\Support\Facades\DB;

class Avances extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estado=Estado::with('Avance')->get();
        $actividad=Actividad::with('Avance')->get();
        $avance=Avance::with('Estado','Actividad')->get();
        return view('GestionAvance.avance')->with(['avance'=>$avance,'estado'=>$estado,'actividad'=>$actividad]);
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
       

        
    $avanceVar= new Avance();
    $avanceVar->descripcionAV = $request->descripcionAV;
    $avanceVar->actividad_Id= $request->actividad_Id;
    $avanceVar->estado_id = $request->estado_id;
    

        if ($avanceVar->save()) {
          $avanceall=Avance::with(['ActividadV2','EstadoV2'])->find($avanceVar->id);
           return response()->json($avanceall);

        }else{
            return response()->json('errormsj', '¡Error al guardar los datos!');

        }
        
    }

    /*FUNCIÓN PARA BUSCAR EL Avance A ACTUALIZAR */
     public function preparactualizar($id){
      $avanceall=Avance::with(['EstadoV2','ActividadV2'])->find($id);
        return response()->json($avanceall);
     }

     /*FUNCIÓN PARA MOSTRAR TODOS LOS Avance*/
    public function listadeAvances(){   
   
     $avanceall=Avance::with(['EstadoV2','ActividadV2'])->get();
        return response()->json($avanceall);
    }
   
    public function buscar_Avances($descripcion='')
    {
        $Avances = Avance::with(['EstadoV2','ActividadV2'])->Where('descripcionAV','like',"%$descripcion%")
                                                    ->get();

        return response()->json($Avances);
    }
  
    
    public function edit($id)
    {
        $avance=Avance::find($id);
        return view ('GestionAvance.avance')->with(['edit'=>true,'avance'=>$avance]);
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
       
             
        $avanceVar=Avance::find($id);;
        $avanceVar->descripcionAV = $request->descripcionAV;
        $avanceVar->actividad_Id= $request->actividad_Id;
        $avanceVar->estado_id = $request->estado_id;
            
            if ($avanceVar->save()){
                $avanceall =Avance::with(['EstadoV2','ActividadV2'])->find($avanceVar->id);
                return response()->json($avanceall);
            }else{
                return back()->with('errormsj', '¡Error al guardar los datos!');
    
            }
    
    }

  /* Cargar Avance*/
    public function CargarDatos()
    {   

       $avanceall=Avance::with('EstadoV2','ActividadV2')->where('estado','activo')->get();
        return response()->json($avanceall);
    }


    public function destroy($id)
    { 
        $avanceall =Avance::find($id);
        $avanceall->delete();
    }
}

