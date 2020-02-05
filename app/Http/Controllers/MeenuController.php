<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Cart;
use App\Order;
use App\Order_MenuItem;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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
            //dd($cart);
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
    
    public function detallesCart(){
        
        
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        
        return view('cart.detalles', compact('cart'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    
    public function storeCart(Request $request){
        //
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
            $precio = $cart->totalPrice;
        } else {
            $cart = null;
        }
        
        $id_user_registra_compra = Auth::user()->id; 
        $nombre_registra_compra = Auth::user()->name;
        $estado = 'Pendiente';
        $seccion = 'Usuario';
        $precio = $cart->totalPrice;

        $fecha_entrega = Carbon::parse($request->fecha_entrega);

        //registrar el pedido
        $pedido = new Order;
        $pedido->id_user_registra_compra = $id_user_registra_compra;
        $pedido->nombre_registra_compra = $nombre_registra_compra;
        $pedido->nombre_retira = $request->nombre_retira;
        $pedido->telefono = $request->telefono;
        $pedido->fecha_entrega = $fecha_entrega;
        $pedido->estado = $estado;

        if($request->observacion === ''){
            $pedido->observacion = '';

        }else{
            $pedido->observacion = $request->observacion;

        }

        if($request->descuento === ''){
            $pedido->descuento = 0;
            $pedido->descuento_aplicado  = false;
            $pedido->precio_total_sin_descuento = $precio;
            $pedido->precio_total_con_descuento = $precio;


        }else{
            $pedido->descuento = $request->descuento;
            $pedido->descuento_aplicado  = true;

            $porcentaje = $request->descuento / 100;
            $precio_con_descuento = $precio - ($precio * $porcentaje);

            $pedido->precio_total_sin_descuento = $precio;
            $pedido->precio_total_con_descuento = $precio_con_descuento;

        }

        $pedido->seccion = $seccion;
        $pedido->save();





    foreach($cart->items as $key => $menu){
        $precio_item = $menu['precio'];
        $titulo = $menu['title'];
    
                 

      /*  $request->validate([

            'nombre_retira' => 'required|min:2',
            'telefono' => 'required|min:5',
            'fecha_entrega' => 'required|after:yesterday'

        ]); */
         
           
        $cantidad = $menu['qty'];
        //dd($request);
        //$precio = $precio_item * $cantidad;
        
    
        //asociar el item al pedido
        $pedido_menuItem = new Order_MenuItem;
        $pedido_menuItem->id_menu_item = $key;  //item que se eligio del menu
        $pedido_menuItem->titulo = $titulo;
        $pedido_menuItem->cantidad = $cantidad;
        $pedido_menuItem->precio = $precio_item;
        $pedido_menuItem->id_pedido = $pedido->id;  //id del pedido de arribas
        $pedido_menuItem->save();        
        
    }
        //retornar con los strings  
        $order= $pedido;
       $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get(); 
        
     
        if(session()->has('cart')){
            
            session()->forget('cart');
                
        }
        //return view('cart.show',compact('order','menuItems','menuItemsLists','personalizars', 'cart'))->with('i', (request()->input('page', 1) - 1) * 5);
        
        return redirect()->route('cart.historial')->with('success', 'Pedido realizo exitosamente' );
        
        //end if personalizar

       //item de menu estandar(el que viene de la base de datos)
      /*  foreach($cart->items as $menu){
        if($menu['title'] != "Sushi Personalizado"){
    
        $id_user_registra_compra = Auth::user()->id; 
        $nombre_registra_compra = Auth::user()->name;
        $estado = 'Pendiente';
        $seccion = 'Usuario';
            
        
        /*$request->validate([

            'menuItem' => 'required',
            'cantidad' => 'required',
            'nombreRetira' => 'required|min:2',
            'telefono' => 'required|min:5',
            'fechaEntrega' => 'required|after:yesterday'

        ]);

        //crear pedido cuando no existe uno previo
        $titulo = DB::table('menus')->select('titulo')->where('id',$request->menuItem)->first()->titulo;

        $precio_item = DB::table('menus')->select('precio')->where('id',$request->menuItem)->first()->precio;

        $cantidad = $cart->totalQty;
        $precio = $precio_item * $cantidad;

        $fecha_entrega = Carbon::parse($request->fechaEntrega);

        $pedido = new Order;
        $pedido->id_user_registra_compra = $id_user_registra_compra;
        $pedido->nombre_registra_compra = $nombre_registra_compra;
        $pedido->nombre_retira = $request->nombre_retira;
        $pedido->telefono = $request->telefono;
        $pedido->fecha_entrega = $fecha_entrega;
        $pedido->estado = $estado;

        if($request->observacion === ''){
            $pedido->observacion = '';

        }else{
            $pedido->observacion = $request->observacion;

        }

        if($request->descuento === ''){
            $pedido->descuento = 0;
            $pedido->descuento_aplicado  = false;
            $pedido->precio_total_sin_descuento = $precio;
            $pedido->precio_total_con_descuento = $precio;


        }else{
            $pedido->descuento = $request->descuento;
            $pedido->descuento_aplicado  = true;

            $porcentaje = $request->descuento / 100;
            $precio_con_descuento = $precio - ($precio * $porcentaje);

            $pedido->precio_total_sin_descuento = $precio;
            $pedido->precio_total_con_descuento = $precio_con_descuento;

        }

        $pedido->seccion = $seccion;
        $pedido->save();        

        //asociar el item al pedido
        $pedido_menuItem = new Order_MenuItem;
        $pedido_menuItem->id_menu_item = 1;  //item que se eligio del menu
        $pedido_menuItem->titulo = $titulo;
        $pedido_menuItem->cantidad = $cantidad;
        $pedido_menuItem->precio = $precio_item;
        $pedido_menuItem->id_pedido = $pedido->id;  //id del pedido de arriba
        $pedido_menuItem->save();

        //retornar con los strings     
        $order= $pedido;
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get();
        
        return view('cart.detalles',compact('order','menuItems','menuItemsLists','personalizars'));

        } } //termino if estandar */
    }
}
