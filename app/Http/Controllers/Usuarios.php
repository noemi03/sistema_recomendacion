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
    	 $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
    
            
    
        ]); 
             
           $UseVar = new Usuario();
           $UseVar->name= $request->name;
           $UseVar->apellidos= $request->apellidos;
           $UseVar->cedula= $request->cedula;
           $UseVar->sexo= $request->sexo;
           $UseVar->celular= $request->celular;
           $UseVar->email= $request->email;
           $UseVar->password= bcrypt($request->password);
           $UseVar->estado= $request->estado ;
           $UseVar->tipoUsuario_id= $request->tipoUsuario_id;
            
            if ($UseVar->save()) {
                 return response()->json($UseVar);
    
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
        //$tipoUsuario= TipoUsuario::all();
        $User=Usuario::find($id);
       return response()->json($User);
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]); 
             
           $UseVar = Usuario::find($id);
           $UseVar->name= $request->name;
           $UseVar->apellidos= $request->apellidos;
           $UseVar->cedula= $request->cedula;
           $UseVar->sexo= $request->sexo;
           $UseVar->celular= $request->celular;
           $UseVar->email= $request->email;
           $UseVar->password= $request->password;
           $UseVar->estado= $request->estado;
           $UseVar->tipoUsuario_id= $request->tipoUsuario_id;
            
            if ($UseVar->save()) {
               return response()->json($UseVar);
    
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

         $User=Usuario::find($id);
          $User->delete();
        
    }
//  public function consultageneral() {
//         $usuarios = Usuario::with('miDepartamento')->get();
//         //dd($usuarios);
//         return response()->json($usuarios);
//     }

    

}
