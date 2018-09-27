<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentouser extends Model
{
    protected $table ='departamentousers';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
       'estado','horarioEntrada','horarioSalida','iddepartamento','idusuario', 
    ];

     public function Departamento()
    {    
     return $this->belongsTo('App\Departamento','iddepartamento','id');
    }
    public function Usuario()
    {    
     return $this->belongsTo('App\Usuario','idusuario','id');
    }
     public function DepartamentoV3()
    {    
     return $this->hasOne('App\Departamento','id','iddepartamento');
    }
     public function UsuarioV3()
    {    
     return $this->hasOne('App\Usuario','id','idusuario');
    }
    //funciona
    public function Departament(){
        return $this->hasOne('App\Departamento','id','iddepartamento')->with('miRecomendacion');
    }

}