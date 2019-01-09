<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargoDepartamento extends Model
{
    public $timestamps = false; 
    protected $table = 'cargodepartamento';
    protected $primaryKey = 'id';
    protected $fillable = [
        'departamento_id','cargos_id',
    ];


    public function  Cargos(){
        return $this->belongsTo('App\Cargo', 'cargos_id', 'id');

    }

    public function CargosV2(){
        return $this->hasOne('App\Cargo','id', 'cargos_id');                      
    }
    
    public function  Departamento(){
        return $this->belongsTo('App\Departamento', 'departamento_id', 'id');

    }
    
    public function DepartamentoV2(){
        return $this->hasOne('App\Departamento','id', 'departamento_id');                      
    }
}
