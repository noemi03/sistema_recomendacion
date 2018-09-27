<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipousuario';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'descripcion', 
    ];

     public function  Usuario(){
        return $this->hasMany('App\Usuario','tipoUsuario_id', 'id');
    }
}
