<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recomendacion;
use App\Subtema;
use App\Estado;
use App\TipoRecomendacion;
use Illuminate\Support\Facades\DB;
class Recomendaciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $subtema = Subtema::with('Recomendacion')->get();
        $estado = Estado::with('Recomendacion')->get();
        $tipoR = TipoRecomendacion::with('Recomendacion')->get();
        $recomendacion = Recomendacion::with('subTemas','Estado','TipoRecomendacion')->get();    
        return view('GestionRecomendaciones.recomendacion')->with(['recomendacion'=> $recomendacion,'subtema'=>$subtema,'estado'=>$estado,'tipoR'=>$tipoR]);
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



        $recomendacionVar = new Recomendacion();
        $recomendacionVar->descripcion = $request->descripcion;
        $recomendacionVar->porcentajeCumplimiento = $request->porcentajeCumplimiento;
        $recomendacionVar->subtema_id = $request->subtema_id;
        $recomendacionVar->estado_id = $request->estado_id; 
        $recomendacionVar->tiporecomendaciones_id = $request->tiporecomendaciones_id;
        

        
        if ($recomendacionVar->save()) {
            return back()->with('msj', 'Datos Guardados');
        } else {
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

        $recomendacion = Recomendacion::with('subTemas','Estado','TipoRecomendacion')->first();
        return  response()->json($recomendacion);
    }

   
    public function buscar_Recomendacion($descripcion='')
    {
        $recomendacion = Recomendacion::with(['subTemas','Estado','TipoRecomendacion'])->Where('descripcion','like',"%$descripcion%")
                                                    ->get();

        return response()->json($recomendacion);
    }




    public function update(Request $request, $id)
    {
   

        $recomendacionVar = Recomendacion::find($id);
        $recomendacionVar->descripcion = $request->descripcion;
        $recomendacionVar->porcentajeCumplimiento = $request->porcentajeCumplimiento;
        $recomendacionVar->subtema_id = $request->subtema_id;
        $recomendacionVar->estado_id = $request->estado_id; 
        $recomendacionVar->tiporecomendaciones_id = $request->tiporecomendaciones_id;
        
        if ($recomendacionVar->save()) {
            //return back()->with('msj', 'Datos Guardados');
            return redirect('recomendaciones');
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
        Recomendacion::destroy($id);
        return back();
    }
    
}
