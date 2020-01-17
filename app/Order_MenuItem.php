<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_MenuItem extends Model
{
    //
     public $table = "orders_menuItems";

    protected $fillable = [

        'cantidad','precio'

    ];
}
