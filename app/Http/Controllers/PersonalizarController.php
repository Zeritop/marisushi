<?php

namespace App\Http\Controllers;

use App\Personalizar;
use App\Menu;
use App\Cart;
use Session;
use Illuminate\Http\Request;
use App\Ingredient;
use Illuminate\Support\Facades\DB;

class PersonalizarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();

  
        return view('personalizars.index',compact('personalizars'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function show(Personalizar $personalizar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function edit(Personalizar $personalizar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personalizar $personalizar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personalizar $personalizar)
    {
        //
    }

    
    public function addToCart(Request $request){

        $request->validate([
            'titulo' => 'required',
            'esencial' => 'required',
            'principal' => 'required',
            'secundario1' => 'required',
            'secundario2' => 'required',
            'envolturaInterna' => 'required',
            'envolturaExterna' => 'required',
        ]);

       $menu = new Menu;
       $menu->titulo = $request->titulo;
       $menu->descripcion = '';
       $menu->precio = 2000;
       $menu->esencial = $request->esencial;
       $menu->principal = $request->principal;
       $menu->secundario1 = $request->secundario1;
       $menu->secundario2 = $request->secundario2;
       if($request->envolturaInterna === "sinNori"){
            $menu->envolturaInterna = null;
       }else{
            $menu->envolturaInterna = $request->envolturaInterna;
       }
       $menu->envolturaExterna = $request->envolturaExterna;
       $menu->save();

       

       if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        } 
        
        
        $cart->add($menu);
        //dd($cart);
        session()->put('cart', $cart);
        return redirect()->route('menu.index')->with('success', 'Menu añadido al carrito de compras');
        
    }


}
