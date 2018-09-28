<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actividad;

class Tarea extends Model
{
    protected $table = 'tarea';
    public $timestamps = false;
    protected $fillable = [
        'descripcion','porcentajeCumplimiento','porcentajeEquivalente','recomendacionesDepartamentoid',];

    public function RecomendacionesDepartamento()
    {    
     return $this->belongsTo('App\RecomendacionesDepartamento','recomendacionesDepartamentoid','id');
    }

    public function Actividades()
    {    
     return $this->hasMany('App\Actividad','id');
    }
   public function RDepartamento(){
    
        return $this->hasOne('App\RecomendacionesDepartamento','id','recomendacionesDepartamentoid');
                              
        }




    

}
