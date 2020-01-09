<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Cart;
use Session;

class MeenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'ASC')
        ->paginate(5);
  
        return view('menu.index',compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1'
        ]);
        
        $cart = new Cart(session()->get('cart'));
        $cart->updateQty($menu->id, $request->qty);
        session()->put('cart', $cart);
        return redirect()->route('cart.show')->with('success', 'Menu actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($menu->id);
        
        if( $cart->totalQty <= 0){
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }
        
        return redirect()->route('cart.show')->with('success', 'Menu eliminado');
    }
    
      /*public function getAddToCart(Request $request, $id){
        $menu = Menu::Find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        dd($request->session()->get('cart'));
        $request->session()->put('cart', $cart);
        return redirect()->route('');
    }*/
    
    public function addToCart(Menu $menu){
       if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        } 
        
        
        $cart->add($menu);
        //dd($cart);
        session()->put('cart', $cart);
        return redirect()->route('menu.index')->with('success', 'Menu añadido');
        
    }
    
    public function showCart(){
        
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        
        return view('cart.show', compact('cart'));
    }
}
