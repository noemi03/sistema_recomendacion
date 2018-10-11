<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	 protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps=false;

    protected $fillable = [
        'name', 'apellidos','cedula','sexo','celular', 'email','password','estado','tipoUsuario_id',
    
 
    ];

   public function TipoUsuario (){
        return $this->belongsTo('App\TipoUsuario','tipoUsuario_id', 'id');
    }
    public function TipoUsuariov2 (){
        return $this->hasOne('App\TipoUsuario','id', 'tipoUsuario_id');
    }

public function  Departamentouser(){
        return $this->hasMany('App\Departamentouser','idusuario','id');
    }
    
     
    //funciona
    public function miDepartamento(){
        return $this->hasOne('App\Departamentouser','idusuario', 'id')->with('Departament');
    }

    public function MisDepartamentos(){
        return $this->hasOne('App\Departamentouser','idusuario', 'id')->with('Departament');
    }

}
