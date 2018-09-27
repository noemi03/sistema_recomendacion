<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecomendacionesDepartamento extends Model
{
     protected $table = 'recomendacionesdepartamento';
    protected $primarykey = 'id';
     public $timestamps = false;

    protected $fillable = [
        'estado','departamento_id','recomendacion_id',];

    public function Tarea()
    {    
     return $this->hasMany('App\Tarea','recomendacionesDepartamentoid','id');
    }

     public function Departamento()
    {    
     return $this->belongsTo('App\Departamento','departamento_id','id');
    }
    public function Recomendacion()
    {    
     return $this->belongsTo('App\Recomendacion','recomendacion_id','id');
    }
     public function DepartamentoV2()
    {    
     return $this->hasOne('App\Departamento','id','departamento_id');
    }
     public function RecomendacionV2()
    {    
     return $this->hasOne('App\Recomendacion','id','recomendacion_id');
    }

    public function Recoment(){
        return $this->hasOne('App\Recomendacion','id','recomendacion_id');
    }

}
