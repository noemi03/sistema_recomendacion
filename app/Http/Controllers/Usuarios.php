<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Usuario;
use App\TipoUsuario;
class Usuarios extends Controller
{
    
     public function index()
    {
        $tipoUsuario=TipoUsuario::with('Usuario')->get();
        $User=Usuario::with('TipoUsuario')->get();
        return view('GestionUsuario.usuario')->with(['User'=>$User,'tipoUsuario'=> $tipoUsuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function  cargarUsuario(){
         $User=Usuario::with('TipoUsuariov2')->get();
         
         return response()->json($User);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	 
             
           $UseVar = new Usuario();
           $UseVar->name= $request->name;
           $UseVar->apellidos= $request->apellidos;
           $UseVar->cedula= $request->cedula;
           $UseVar->sexo= $request->sexo;
           $UseVar->celular= $request->celular;
           $UseVar->email= $request->email;
           $UseVar->password= bcrypt($request->password);
           $UseVar->estado="Activo";
           $UseVar->tipousuario_id= $request->tipousuario_id;
            $UseVar->save();

            $usuarioall=Usuario::with(['TipoUsuariov2'])->find($UseVar->id);
              return response()->json($usuarioall);
        
    }

    public function preparactualizarusuario($id){
     $usuarioall=Usuario::with(['TipoUsuariov2'])->find($id);
        return response()->json($usuarioall);
     }
      /*FUNCIÓN PARA MOSTRAR TODOS LOS SUBTEMA*/
    public function listausuario(){
    $usuarioall=Usuario::with(['TipoUsuariov2'])->where ('estado','Activo')->get();
         return response()->json($usuarioall);   
      
      }
      
    public function edit($id)
    {
        $tipoUsuario= TipoUsuario::all();
        $User=Usuario::find($id);     
        return view('GestionUsuario.usuario')->with(['edit' => true,'User'=>$User,'tipoUsuario'=> $tipoUsuario]);
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
        
          
           $UseVar = Usuario::find($id);
           $UseVar->name= $request->name;
           $UseVar->apellidos= $request->apellidos;
           $UseVar->cedula= $request->cedula;
           $UseVar->sexo= $request->sexo;
           $UseVar->celular= $request->celular;
           $UseVar->email= $request->email;
           $UseVar->password= $request->password;
           $UseVar->tipousuario_id= $request->tipousuario_id;
            $UseVar->save();
            
            $usuarioall=Usuario::with(['TipoUsuariov2'])->find($UseVar->id);
              return response()->json($usuarioall);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminarusuario($id){
          $UseVar=Usuario::find($id);
          $UseVar->estado="Inactivo";
         $UseVar->save();
          return response()->json($UseVar);
    }

    public function destroy($id)
    {

         $User=Usuario::find($id);
          $User->delete();
        
    }
    public function vergeneral(){

        return view('Gestiongeneral.general');

    }

    //esta consulta filtra las recomendaciones de el usuario en cuestion
    public function MisDepartamentos($id){
        $usuarios = Usuario::with('MisDepartamentos')->where('id',$id)->firstOrFail();
        //dd($usuarios);
        return response()->json($usuarios);
    }

}
