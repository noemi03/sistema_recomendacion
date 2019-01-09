<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public $timestamps = false; 
    protected $table = 'tarea';
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcionTarea','porcentajeCumplimientotarea', 'estadoTarea','fechaCreacion','fecha'
        ,'recomendacionesusuarios_id',
    ];


    public function Actividades()
    {    
     return $this->hasMany('App\Actividad','id');
    }
   
    public function  RecomendacionesUsuarios(){
        return $this->belongsTo('App\RecomendacionUsuario', 'recomendacionesusuarios_id', 'id');
}
  public function RecomendacionesUsuariosV2(){
    return $this->hasOne('App\RecomendacionUsuario','id', 'recomendacionesusuarios_id');                      
  }

}
