<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\Recomendacion;
use App\RecomendacionUsuario;
class RecomendacionesUsuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function  cargarUsuarioRecomendacione(){
        $User=Usuario::with('TipoUsuariov2')->get();        
        return response()->json($User);
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
     $recomendacionesUsuariosVar=new RecomendacionUsuario();
     $recomendacionesUsuariosVar->estadoRecomendacionUsuario=$request->estadoRecomendacionUsuario;
     $recomendacionesUsuariosVar->porcentajeCumplimiento=$request->porcentajeCumplimiento;
     $recomendacionesUsuariosVar->fechaInicio=$request->fechaInicio;
     $recomendacionesUsuariosVar->fechaFin=$request->fechaFin;
     $recomendacionesUsuariosVar->documento=$request->documento;
     $recomendacionesUsuariosVar->codigoDocumento=$request->codigoDocumento;
     $recomendacionesUsuariosVar->recomendacion_id=$request->recomendacion_id;
     $recomendacionesUsuariosVar->users_id=$request->users_id;
    
     if ($recomendacionesUsuariosVar->save()) {
        $recomendacionesUsuariosall=RecomendacionUsuario::with(['RecomendacionesV2','UsuariosV2'])->find($recomendacionesUsuariosVar->id);
         return response()->json($recomendacionesUsuariosall);
   } else {
       return back()->with('errormsj', '¡Error al guardar los datos!');
   }
    
}



public function ActualizarRecomendacionesUsuarios($id)
    {
        $recomendacionesUsuariosall=RecomendacionUsuario::with(['RecomendacionesV2','UsuariosV2'])->find($id);
        return response()->json($recomendacionesUsuariosall);

    }
    
     
  //mostrar
    public function listarRecomendacionesUsuarios($id)
    {
        $recomendacionesUsuariosall=RecomendacionUsuario::with(['RecomendacionesV2','UsuariosV2'])->where('recomendacion_id', $id)->get();
        return response()->json($recomendacionesUsuariosall);
        
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
        //
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
     $recomendacionesUsuariosVar=RecomendacionUsuario::find($id);
     $recomendacionesUsuariosVar->estadoRecomendacionUsuario=$request->estadoRecomendacionUsuario;
     $recomendacionesUsuariosVar->porcentajeCumplimiento=$request->porcentajeCumplimiento;
     $recomendacionesUsuariosVar->fechaInicio=$request->fechaInicio;
     $recomendacionesUsuariosVar->fechaFin=$request->fechaFin;
     $recomendacionesUsuariosVar->documento=$request->documento;
     $recomendacionesUsuariosVar->codigoDocumento=$request->codigoDocumento;
     $recomendacionesUsuariosVar->recomendacion_id=$request->recomendacion_id;
     $recomendacionesUsuariosVar->users_id=$request->users_id;
    
     if ($recomendacionesUsuariosVar->save()) {
        $recomendacionesUsuariosall=RecomendacionUsuario::with(['RecomendacionesV2','UsuariosV2'])->find($recomendacionesUsuariosVar->id);
         return response()->json($recomendacionesUsuariosall);
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
    $recomendacionesUsuariosVar = RecomendacionUsuario::find($id);
    $recomendacionesUsuariosVar->delete();
    }
}
