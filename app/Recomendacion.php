<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    public $timestamps = false; 
    protected $table = 'recomendacion';
    protected $fillable = [
        'descripcion','porcentajeCumplimiento','subtema_id','estado_id','tiporecomendaciones_id',
    ];

    public function subTemas(){
        return $this->belongsTo('App\Subtema', 'subtema_id', 'id');
    }
    public function Estado(){
        return $this->belongsTo('App\Estado','estado_id', 'id');
    }
    public function TipoRecomendacion (){
        return $this->belongsTo('App\TipoRecomendacion','tiporecomendaciones_id', 'id');
    }
     public function  RecomendacionesDepartamento()
    {    
     return $this->hasMany('App\RecomendacionesDepartamento','recomendacion_id','id');
    }
}
