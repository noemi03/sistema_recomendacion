<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtema;
use App\Informe;
class Subtemas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informe = Informe::with('Subtema')->get();
        $subtemas =Subtema::with('Informe')->get();
        return view('GestionSubtema.subtema')->with(['subtemas'=> $subtemas,'informe'=>$informe]);
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
        
        $subtemaVar = new Subtema();
        $subtemaVar->descripcionSubtema = $request->descripcionSubtema;
        $subtemaVar->conclusion = "SIN CONCLUSION";
        $subtemaVar->porcentajeCumplidoSubtema= $request->porcentajeCumplidoSubtema;
        $subtemaVar->estadoSubtema = "SIN ASIGNAR";
        $subtemaVar->informe_id = $request->informe_id;
        $subtemaVar->save();
        
        
        $subtemaall=Subtema::with(['InformeV2'])->find($subtemaVar->id);
              return response()->json($subtemaall);
        
    }

    /*FUNCIÓN PARA BUSCAR EL TAREA A SUBTEMA */
     public function preparactualizarsubtema($id){
      $subtemaall=Subtema::with(['InformeV2'])->find($id);
        return response()->json($subtemaall);
     }

     /*FUNCIÓN PARA MOSTRAR TODOS LOS SUBTEMA*/
    public function listasubtema(){
    $subtemaall=Subtema::with(['InformeV2'])->get();
         return response()->json($subtemaall);   
      
      }


    public function edit($id)
    {
        $informe = Informe::all();
        $subtemas = Subtema::find($id);    
        //dd($subtemas);  
        return view('GestionSubtema.subtema')->with(['edit' => true,'subtemas'=>$subtemas,'informe'=>$informe]);
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
    

        $subtemaVar = Subtema::find($id);
        $subtemaVar->descripcionSubtema = $request->descripcionSubtema;
        $subtemaVar->conclusion = $request->conclusion;
        $subtemaVar->porcentajeCumplidoSubtema= $request->porcentajeCumplidoSubtema;
        $subtemaVar->estadoSubtema = $request->estadoSubtema;
        $subtemaVar->informe_id = $request->informe_id;
        
        if ($subtemaVar->save()) {
          $subtemaall=Subtema::with(['InformeV2'])->find($subtemaVar->id);
              return response()->json($subtemaall);
        } else {
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
       $subtemaall =Subtema::find($id);
        $subtemaall->delete();
    }



    public function buscar_Subtema($descripcion='')
    {
        $subtema =    Subtema::with(['InformeV2'])->Where('descripcionSubtema','like',"%$descripcion%")
                                                    ->get();

        return response()->json($subtema);
    }



    public function modificarSubtemaEstado(Request $request)
    {
        $id=$request->id;
        $consulta=Subtema::findOrFail($id);
        $consulta->estadoSubtema=$request->estadoSubtema;
        $consulta->conclusion=$request->conclusion;
        $consulta->update();

        return response()->json($consulta);
        
    }

    
}
