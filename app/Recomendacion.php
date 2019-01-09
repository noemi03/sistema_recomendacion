<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    public $timestamps = false; 
    protected $table = 'recomendacion';
    protected $fillable = [
        'descripcionRecomendacion','porcentajeCumplimiento','estadoRecomendacion','subtema_id'
    ];


    public function subTemas(){
        return $this->belongsTo('App\Subtema', 'subtema_id', 'id');
    }
    
     //para traer lo que esta en  subtema a recomendacion 
    public function subtemasV2(){
        return $this->hasOne('App\Subtema', 'id', 'subtema_id');
    }

    public function  RecomendacionesUsuarios(){
        return $this->hasMany('App\RecomendacionUsuario','recomendacion_id','id');
     }
    
      }
