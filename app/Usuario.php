<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	 protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps=false;

    protected $fillable = [
        'name', 'apellidos','cedula','sexo','celular', 'email','password','estado','tipousuario_id',
    
 
    ];

   public function TipoUsuario (){
        return $this->belongsTo('App\TipoUsuario','tipousuario_id', 'id');
    }
    public function TipoUsuariov2 (){
        return $this->hasOne('App\TipoUsuario','id', 'tipousuario_id');
    }



       public function  Cargouser(){
        return $this->hasMany('App\CargoUsuario','users_id','id');
     }
    
     public function  RecomendacionesUsuarios(){
        return $this->hasMany('App\RecomendacionUsuario','users_id','id');
     }
    
}


