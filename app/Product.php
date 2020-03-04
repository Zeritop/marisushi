<?php

namespace App;

use App\Ingretient;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [

        'name', 'observaciones', 'precio_inicial', 'precio_actual', 'descuento', 'cantidad', 'proveedor','marca','unidad_medida'

    ];


}
