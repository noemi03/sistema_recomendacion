<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipousuario';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'descripciontipo', 
    ];

     public function  Usuario(){
        return $this->hasMany('App\Usuario','tipousuario_id', 'id');
    }
}
