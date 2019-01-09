<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
  
    public $timestamps=false;
    protected $fillable = [
        'descripcionActividad','fecha','tarea_id'];


    public function Tareas()
    {    
      return $this->belongsTo('App\Tarea','tarea_id','id');
    }
    
  
     public function TareasV2()
    {    
      return $this->hasOne('App\Tarea','id','tarea_id');
    }
    
}
