<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [

        'titulo', 'descripcion', 'precio', 'foto'

    ];
    
     //Scopes
    
    public function scopeTitulo($query, $titulo){
        if($titulo){
            return $query->where('titulo', 'LIKE', "%$titulo%");
        }
    }
    
    public function scopeDescripcion($query, $descripcion){
        if($descripcion){
            return $query->where('descripcion', 'LIKE', "%$descripcion%");
        }
    }
}
