<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Usuario;
use App\Departamentouser;
class Departamentousers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        // $departamento=Departamento::with('Departamentouser')->get();
        // $usuario=Usuario::with('Departamentouser')->get();
        // $departamentoUsuario= Departamentouser::with('Departamento','Usuario')->get();
        // return view ('GestionRecomendacionDepartamento.recomendaciondepartamento')->with(['departamentoUsuario'=>$departamentoUsuario,'departamento'=>$departamento,'usuario'=>$usuario]);
    }

    
    public function store(Request $request)
    {
       
        $departamentousuarioVar= new Departamentouser();
        $departamentousuarioVar->estado= $request->estado; 
        $departamentousuarioVar->horarioEntrada= $request->horarioEntrada; 
        $departamentousuarioVar->horarioSalida= $request->horarioSalida;      
        $departamentousuarioVar->iddepartamento= $request->iddepartamento;
        $departamentousuarioVar->idusuario= $request->idusuario;
       $departamentousuarioVar->save();


        $departamentousuarioall=Departamentouser::with(['DepartamentoV3','UsuarioV3'])->find($departamentousuarioVar->id);
        return response()->json($departamentousuarioall);
    }

    /*FUNCIÓN PARA BUSCAR EL RECOMENDACIONES DEPARTAMENTO */
    public function preparactualizarDepartamentoUsuario($id){

   $departamentousuarioall=Departamentouser::with(['DepartamentoV3','UsuarioV3'])->find($id);
        return response()->json($departamentousuarioall);
     }

     /*FUNCIÓN PARA MOSTRAR TODOS LOS RECOMENDACIONES DEPARTAMENTO*/
    public function listarDepartamentoUsuario($id){  
   $departamentousuarioall=Departamentouser::with(['DepartamentoV3','UsuarioV3'])->where('idusuario', $id)
           ->get();
        
        return response()->json($departamentousuarioall);
      }
    public function edit($id)
    {
      //  $departamentoUsuario = Departamentouser::find($id);
      //  $departamento =Departamento::all();
      // $usuario =Usuario::all();
       
      //   return view('GestionRecomendacionDepartamento.recomendaciondepartamento')->with(['edit' => true,' departamentoUsuario' => $departamentoUsuario,'departamento' =>$departamento,'usuario' =>$usuario]);
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
        $recomendacionDepartamentoVar=Departamentouser::find($id);
        $departamentousuarioVar->estado= $request->estado; 
        $departamentousuarioVar->horarioEntrada= $request->horarioEntrada; 
        $departamentousuarioVar->horarioSalida= $request->horarioSalida;      
        $departamentousuarioVar->iddepartamento= $request->iddepartamento;
        $departamentousuarioVar->idusuario= $request->idusuario;
       $departamentousuarioVar->save();


        $departamentousuarioall=Departamentouser::with(['DepartamentoV3','UsuarioV3'])->find($departamentousuarioVar->id);
        return response()->json($departamentousuarioall);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamentousuarioVar =Departamentouser::find($id);
        $departamentousuarioVar->delete();
    }
}
