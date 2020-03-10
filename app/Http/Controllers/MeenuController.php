<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Cart;
use App\Order;
use App\Order_MenuItem;
use Session;
use App\Discount;
use App\Product;
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
        ->where('titulo','not like','Sushi Personalizado: 10 piezas')
        ->where('titulo','not like','Handroll Personalizado')
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

      $request->validate([
            'nombre_retira' => 'required|regex:/^[a-zA-Z '.'.-]*$/',
            'fechaEntrega' => 'required',
        ]);

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

        $fecha_entrega = Carbon::createFromFormat('d/m/Y H:i', $request->fechaEntrega);

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
  $codigo = DB::table('discounts')->where('codigo', $request->codigo)->exists();

        //dd($codigo1);
        if($request->codigo != ''){
            if($codigo){
            $codigo1 = DB::table('discounts')->where('codigo', '=', $request->codigo)->first();
            $pedido->descuento = $codigo1->descuento;
            //dd($pedido->descuento);
            $pedido->descuento_aplicado  = true;

            $porcentaje = $codigo1->descuento / 100;
            $precio_con_descuento = $precio - ($precio * $porcentaje);

            $pedido->precio_total_sin_descuento = $precio;
            $pedido->precio_total_con_descuento = $precio_con_descuento;


        }else{
            return redirect()->route('cart.detalles')->with('danger', 'Codigo no existente' );
            }
        }else{

           $pedido->descuento = 0;
            $pedido->descuento_aplicado  = false;
            $pedido->precio_total_sin_descuento = $precio;
            $pedido->precio_total_con_descuento = $precio;

        }

        $pedido->seccion = $seccion;
        $pedido->save();





    foreach($cart->items as $key => $menu){
        $precio_item = $menu['precio'];
        $titulo = $menu['title'];
        $cantidad = $menu['qty'];

        //asociar el item al pedido
        $pedido_menuItem = new Order_MenuItem;
        $pedido_menuItem->id_menu_item = $key;  //item que se eligio del menu
        $pedido_menuItem->titulo = $titulo;
        $pedido_menuItem->cantidad = $cantidad;
        $pedido_menuItem->precio = $precio_item;
        $pedido_menuItem->id_pedido = $pedido->id;  //id del pedido de arribas
        $pedido_menuItem->save();

  /*      $ingre = DB::table('ingredients')->select('name')->where('name', '=', $menu['esencial'])->first();
        $prod = DB::table('products')->select('cantidad')->where('name', '=', $ingre->name)->decrement('cantidad', 1);

         $ingre1 = DB::table('ingredients')->select('name')->where('name', '=', $menu['principal'])->first();
        $prod1 = DB::table('products')->select('cantidad')->where('name', '=', $ingre1->name)->decrement('cantidad', 1);

         $ingre2 = DB::table('ingredients')->select('name')->where('name', '=', $menu['secundario1'])->first();
        $prod2 = DB::table('products')->select('cantidad')->where('name', '=', $ingre2->name)->decrement('cantidad', 1);

         $ingre3 = DB::table('ingredients')->select('name')->where('name', '=', $menu['secundario2'])->first();
        $prod3 = DB::table('products')->select('cantidad')->where('name', '=', $ingre3->name)->decrement('cantidad', 1);

    */    

        //$prod->save();
    }
        //retornar con los strings
        $order= $pedido;
       $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get();


        if(session()->has('cart')){

            session()->forget('cart');

        }

        return redirect()->route('cart.historial')->with('success', 'Pedido realizado exitosamente');

    }
}
