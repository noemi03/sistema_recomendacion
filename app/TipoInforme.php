<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInforme extends Model
{
    
    protected $table = 'tipo_informe';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'tipoInforme', 
    ];
     public function  Informe(){
        return $this->hasMany('App\Informe','tipoInforme_id', 'id');
    }
}
