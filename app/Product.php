<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'name', 'observaciones', 'precio_inicial', 'precio_actual', 'descuento', 'cantidad', 'proveedor'

    ];

}
