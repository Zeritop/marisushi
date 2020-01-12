<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

     protected $fillable = [
        'cart',
    ];

    
    public function user(){
        
       return $this->belongsTo('App\User');
    }

    //
    protected $fillable = [

        'nombre_registra_compra','nombre_retira','telefono','estado','observacion',
        'precio_total_sin_descuento','descuento','descuento_aplicado','precio_total_con_descuento','seccion'

    ];

   // protected $casts = [
   // 'fecha_entrega' => 'datetime:DD/MM/YYYY HH:mm'
   //	];

}
