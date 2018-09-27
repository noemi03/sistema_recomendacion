<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    public $timestamps = false; 
    protected $table = 'informe';
    protected $primaryKey = 'id';
   protected $fillable = [
        'fechaAprobacion', 'memorandoSolicitud', 'temaExamen','porcentajeCumplido', 
        'observacion', 'codigoInforme','archivos',
    ];

public function  Subtema(){
          return $this->belongsTo('App\Subtema', 'informe_id', 'id');
    }

}
