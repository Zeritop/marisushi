<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice;
    
    public function __construct($cart = null){
        if($cart){
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }
    
    
    public function add($menu){
        
        $item = [
            'id' => $menu->id,
            'title' => $menu->titulo,
            'precio' => $menu->precio,
            'qty' => 0,
            'image' => $menu->foto,
            'esencial' => $menu->esencial,
            'principal' => $menu->principal,
            'secundario1' => $menu->secundario1,
            'secundario2' => $menu->secundario2,
            'envoltura' => $menu->envoltura,
            'ingrediente1' => $menu->ingrediente1,
            'ingrediente2' => $menu->ingrediente2,
            'ingrediente3' => $menu->ingrediente3,
            'ingrediente4' => $menu->ingrediente4,
            'ingrediente5' => $menu->ingrediente5,
        ];
        
        if(!array_key_exists($menu->id, $this->items)){
            $this->items[$menu->id] = $item; 
            $this->totalQty +=1;
            $this->totalPrice += $menu->precio;
        } else {
            $this->totalQty +=1;
            $this->totalPrice += $menu->precio; 
        }
        
        $this->items[$menu->id]['qty'] +=  1; 
    }
    
    public function remove($id){
        
        if(array_key_exists($id, $this->items)){
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['precio'];
            unset($this->items[$id]);
        }
    }
    
    public function updateQty($id, $qty){
        //reset
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['precio'] * $this->items[$id]['qty'];
        
        //add
        $this->items[$id]['qty'] = $qty;
        
        //total price
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['precio'] * $qty;
    }
}

