<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CargoUsuario;
use App\Cargo;
use App\Usuario;

class CargosUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $cargosUsuarios= CargoUsuario::with('Cargos','Usuarios')->get();
        $cargos= Cargo::with('CargosUsuariosR2')->get(); 
        $usuarios= User::with('CargosUsuariosR')->get(); 
        return view('GestionCargosUsuarios.CargosUsuarios')->with(['cargosUsuarios'=>$cargosUsuarios,
        'cargos'=>$cargos,'usuarios'=>$usuarios]);
       */
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
         
        $cargosUsuariosVar= new CargoUsuario();
        $cargosUsuariosVar->estadoCargo = $request->estadoCargo;
        $cargosUsuariosVar->fechaInicio = $request->fechaInicio;
        $cargosUsuariosVar->fechaFin = $request->fechaFin;
        $cargosUsuariosVar->users_id = $request->users_id;
        $cargosUsuariosVar->cargos_id = $request->cargos_id;
        

        if ($cargosUsuariosVar->save()) {
             $cargosUsuariosall=CargoUsuario::with(['CargosV2','UsuariosV2'])->find($cargosUsuariosVar->id);
              return response()->json($cargosUsuariosall);
        } else {
            return back()->with('errormsj', '¡Error al guardar los datos!');
        }
        
    }


    public function ActualizarCargosUsuarios($id)
    {
        $cargosUsuariosall=CargoUsuario::with(['CargosV2','UsuariosV2'])->find($id);
        return response()->json($cargosUsuariosall);

    }
    
     
  //mostrar
    public function listarCargosUsuarios($id)
    {
        $cargosUsuariosall=CargoUsuario::with(['CargosV2','UsuariosV2'])->where('users_id', $id)->get();
        return response()->json($cargosUsuariosall);
        
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
        $cargosUsuariosVar= CargoUsuario::find($id);
        $cargosUsuariosVar->estadoCargo = $request->estadoCargo;
        $cargosUsuariosVar->fechaInicio = $request->fechaInicio;
        $cargosUsuariosVar->fechaFin = $request->fechaFin;
        $cargosUsuariosVar->users_id = $request->users_id;
        $cargosUsuariosVar->cargos_id = $request->cargos_id;
        

        
        $cargosUsuariosall=CargoUsuario::with(['CargosV2','UsuariosV2'])->find($cargosUsuariosVar->id);
        return response()->json($cargosUsuariosall);
              
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargosUsuariosVar = CargoUsuario::find($id);
        $cargosUsuariosVar->delete();
    }
}
