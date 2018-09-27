<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
  
    public $timestamps=false;
    protected $fillable = [
        'descripcionA','fecha','tarea_id'];


    public function Tareas()
    {    
      return $this->belongsTo('App\Tarea','tarea_id','id');
    }
    
   public function  Avance(){
        return $this->hasMany('App\Avance','id');
    }
     public function TareasV2()
    {    
      return $this->hasOne('App\Tarea','id','tarea_id');
    }
    
}
