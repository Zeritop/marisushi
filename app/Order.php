<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    //
    protected $fillable = [

        'observacion','precio_total_sin_descuento','descuento','descuento_aplicado','precio_total_con_descuento','seccion'

    ];

    protected $dates = ['fecha_entrega'];
    
    //Scopes
    
    public function scopeEstado($query, $estado){
        if($estado){
            return $query->where('estado', 'LIKE', "%$estado%");
        }
    }
    
    public function scopeFecha($query, $fecha_entrega){
        if($fecha_entrega){
            return $query->where('fecha_entrega', 'LIKE', "%$fecha_entrega%");
        }
    }

}
