<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Recomendacion;
use App\RecomendacionesDepartamento;
use Illuminate\Support\Facades\DB;
class RecomendacionesDepartamentos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departamento=Departamento::with('RecomendacionesDepartamento')->get();
        $recomendacion=Recomendacion::with('RecomendacionesDepartamento')->get();
        $recodepar= RecomendacionesDepartamento::with('Departamento','Recomendacion')->get();
        return view ('GestionRecomendacionDepartamento.recomendaciondepartamento')->with(['recodepar'=>$recodepar,'departamento'=>$departamento,'recomendacion'=>$recomendacion]);
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
     
        $recomendacionDepartamentoVar= new RecomendacionesDepartamento();
        $recomendacionDepartamentoVar->estado= $request->estado; 
        $recomendacionDepartamentoVar->departamento_id= $request->departamento_id;      
        $recomendacionDepartamentoVar->recomendacion_id= $request->recomendacion_id;
        $recomendacionDepartamentoVar->save();


        $recomendacionDepartamentoall=RecomendacionesDepartamento::with(['DepartamentoV2','RecomendacionV2'])->find($recomendacionDepartamentoVar->id);
        return response()->json($recomendacionDepartamentoall);
            
    }

    /*FUNCIÓN PARA BUSCAR EL RECOMENDACIONES DEPARTAMENTO */
    public function preparactualizarrecomendacioD($id){

    $recomendacionDepartamentoall=RecomendacionesDepartamento::with(['DepartamentoV2','RecomendacionV2'])->find($id);
        return response()->json($recomendacionDepartamentoall);
     }

     /*FUNCIÓN PARA MOSTRAR TODOS LOS RECOMENDACIONES DEPARTAMENTO*/
    public function listarecomendacionD($id){  

       
        $recomendacionDepartamentoall=RecomendacionesDepartamento::with(['DepartamentoV2','RecomendacionV2'])->where('recomendacion_id', $id)
           ->get();
        
        return response()->json($recomendacionDepartamentoall);
      }

    public function edit($id)
    {
       $recodepar = RecomendacionesDepartamento::find($id);
       $departamento =Departamento::all();
       $recomendacion =Recomendacion::all();
       
        return view('GestionRecomendacionDepartamento.recomendaciondepartamento')->with(['edit' => true,'recodepar' =>$recodepar,'departamento' =>$departamento,'recomendacion' =>$recomendacion]);
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
          
        $recomendacionDepartamentoVar=RecomendacionesDepartamento::find($id);
        $recomendacionDepartamentoVar->estado= $request->estado; 
        $recomendacionDepartamentoVar->departamento_id= $request->departamento_id;      
        $recomendacionDepartamentoVar->recomendacion_id= $request->recomendacion_id;
        $recomendacionDepartamentoVar->save();


        $recomendacionDepartamentoall=RecomendacionesDepartamento::with(['DepartamentoV2','RecomendacionV2'])->find($recomendacionDepartamentoVar->id);
        return response()->json($recomendacionDepartamentoall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recomendacionDepartamentoall =RecomendacionesDepartamento::find($id);
        $recomendacionDepartamentoall->delete();
        
    }
    

}
