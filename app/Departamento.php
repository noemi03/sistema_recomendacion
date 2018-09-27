<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    
    public $timestamps=false;

    protected $fillable=['descripcion'];

     public function  RecomendacionesDepartamento()
    {    
     return $this->hasMany('App\RecomendacionesDepartamento','departamento_id','id');
    }
    public function  Departamentouser()
    {    
     return $this->hasMany('App\Departamentouser','iddepartamento','id');
    }
    

    public function miRecomendacion(){
        return $this->hasOne('App\RecomendacionesDepartamento','departamento_id', 'id')->with('Recoment');
    }

}
