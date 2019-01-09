<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departamento;
use App\Cargo;
use App\CargoDepartamento;
class CargosDepartamentos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $cargosDepartamentoVar= new CargoDepartamento();
        $cargosDepartamentoVar->departamento_id = $request->departamento_id;
        $cargosDepartamentoVar->cargos_id = $request->cargos_id;
        

        if ($cargosDepartamentoVar->save()) {
             $cargosDepartamentoall=CargoDepartamento::with(['CargosV2','DepartamentoV2'])->find($cargosDepartamentoVar->id);
              return response()->json($cargosDepartamentoall);
        } else {
            return back()->with('errormsj', '¡Error al guardar los datos!');
        }
        
    }


    public function ActualizarCargosDepartamentos($id)
    {
        $cargosDepartamentoall=CargoDepartamento::with(['CargosV2','DepartamentoV2'])->find($id);
        return response()->json($cargosDepartamentoall);

    }
    
     
  //mostrar
    public function listarCargosDepartamentos($id)
    {
        $cargosDepartamentoall=CargoDepartamento::with(['CargosV2','DepartamentoV2'])->where('departamento_id', $id)->get();
        return response()->json($cargosDepartamentoall);
        
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
        $cargosDepartamentoVar=CargoDepartamento::find($id);
        $cargosDepartamentoVar->departamento_id = $request->departamento_id;
        $cargosDepartamentoVar->cargos_id = $request->cargos_id;
        

        if ($cargosDepartamentoVar->save()) {
             $cargosDepartamentoall=CargoDepartamento::with(['CargosV2','DepartamentoV2'])->find($cargosDepartamentoVar->id);
              return response()->json($cargosDepartamentoall);
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
        $cargosDepartamentoVar = CargoDepartamento::find($id);
        $cargosDepartamentoVar->delete();
    }
}
