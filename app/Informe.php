<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    public $timestamps = false; 
    protected $table = 'informe';
    protected $primaryKey = 'id';
   protected $fillable = [
        'fechaAprobacion','fechaLimite', 'memorandoSolicitud', 'temaExamen','porcentajeCumplido',
         'observacion', 'codigoInforme','estadoInforme','tipoInforme_id',
    ];
    public function  TipoInforme(){
            return $this->belongsTo('App\TipoInforme', 'tipoInforme_id', 'id');
    }
    public function TipoinformeV2(){
        return $this->hasOne('App\TipoInforme','id', 'tipoInforme_id');                      
    }
    public function Subtema(){
        return $this->hasMany('App\Subtema','informe_id','id');
    }

}



