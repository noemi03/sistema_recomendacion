<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtema extends Model
{
    public $timestamps = false; 
    protected $table = 'subtema';
    protected $fillable = [
        'descripcionSubtema','conclusion','porcentajeCumplidoSubtema','estadoSubtema','informe_id', 
    ];

    public function Recomendacion(){
        return $this->hasMany('App\Recomendacion', 'id');
    }
   
     public function Informe(){
        return $this->belongsTo('App\Informe','informe_id','id');
    }
     public function InformeV2(){
        return $this->hasOne('App\Informe','id','informe_id');
                              
        }


     
}
