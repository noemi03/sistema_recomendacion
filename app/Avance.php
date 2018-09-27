<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    protected $table ='avance';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'descripcionAV','actividad_Id','estado_id', 
    ];
    public function Estado(){
        return $this->belongsTo('App\Estado', 'estado_id', 'id');
    }
    public function Actividad(){
        return $this->belongsTo('App\Actividad', 'actividad_Id', 'id');
    }
    
    public function ActividadV2(){
        return $this->hasOne('App\Actividad','id','actividad_Id');
    }
     public function EstadoV2(){
        return $this->hasOne('App\Estado','id','estado_id');
                              
        }

}



   