<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    
    public $timestamps=false;

    protected $fillable=['descripcionDepartamento'];

     
    public function  CargoDepartamento(){
        return $this->hasMany('App\CargoDepartamento','departamento_id', 'id');
        }
}
