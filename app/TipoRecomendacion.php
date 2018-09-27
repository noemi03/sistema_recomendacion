<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRecomendacion extends Model
{
    
    protected $table = 'tiporecomendaciones';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'descripcion', 
    ];
     public function  Recomendacion(){
        return $this->hasMany('App\Recomendacion','tiporecomendaciones_id', 'id');
    }
}
