<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
  
    public $timestamps=false;
    protected $fillable = [
        'descripcion', 
    ];

    public function  Avance(){
        return $this->hasMany('App\Avance','id');
    }
    
     public function  Recomendacion(){
        return $this->hasMany('App\Recomendacion', 'estado_id','id');
    }

}
