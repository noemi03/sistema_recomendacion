<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;

class Documentos extends Controller
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
    
          $archivo = $request->file('input_file'); // obtenemos la url del documento asi es el nombre del input de tipo file que manda el formulario
            $destino = public_path().'/documentoGuardar'; // destino donde se almacena el documento esta carpeta esta en public
            $nombreDoc = date('Ymd').time().'_'.$archivo->getClientOriginalName(); // le damos un nombe al documento
            $archivo->move($destino, $nombreDoc); // movemos el documento a la ruta osea en la carpeta /imagenesGuardadas

           ///***********guardar en BD los datos**********
            $documento = new Documento();
            $documento->descripcion =$archivo->getClientOriginalName();
            $documento->ruta = 'documentoGuardar/'.$nombreDoc;
            $documento->save();
            return $documento;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
