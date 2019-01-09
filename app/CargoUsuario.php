<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargoUsuario extends Model
{
    public $timestamps = false; 
    protected $table = 'cargousuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'estadoCargo','fechaInicio', 'fechaFin', 'users_id',
        'cargos_id',
    ];
    public function  Cargos(){
            return $this->belongsTo('App\Cargo', 'cargos_id', 'id');
    }
    public function CargosV2(){
        return $this->hasOne('App\Cargo','id', 'cargos_id');                      
    }
    public function Usuarios(){
        return $this->belongsTo('App\Usuario', 'users_id', 'id');    }

    public function UsuariosV2(){
            return $this->hasOne('App\Usuario','id', 'users_id');                      
    }
}

