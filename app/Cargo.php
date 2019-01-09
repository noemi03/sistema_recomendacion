<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [  'descripcionCargo', ];
  

    public function  Cargouser(){
        return $this->hasMany('App\CargoUsuario','cargos_id', 'id');
        }

    public function  CargoDepartamento(){
        return $this->hasMany('App\CargoDepartamento','cargos_id', 'id');
        }
    
     
}
