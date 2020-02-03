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

}
