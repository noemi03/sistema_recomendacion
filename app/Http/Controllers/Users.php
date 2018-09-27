<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TipoUsuario;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoUsuario= TipoUsuario::with('User')->get();
        $Users=User::with('TipoUsuario')->get();;
        return view('layouts.User')->with(['Users'=> $Users,'tipoUsuario'=> $tipoUsuario]);
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
        //
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
        $tipoUsuario= TipoUsuario::all();
        $Users=User::find($id);
        return view('layouts.User')->with(['Users'=> $Users ,'tipoUsuario'=> $tipoUsuario]);
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
             
           $UseVar =User::find($id);
           $UseVar->name= $request->name;
           $UseVar->email= $request->email;
           $UseVar->password= $request->password;
           $UseVar->tipoUsuario_id= $request->tipoUsuario_id;
            
            if ($UseVar->save()) {
                return back()->with('msj','Datos guardados');
    
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
        User::destroy($id);
        return back();
    }
}
