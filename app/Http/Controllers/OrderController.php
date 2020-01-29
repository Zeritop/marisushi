<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_MenuItem;
use App\Menu;
use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        //
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::orderBy('created_at', 'ASC')->paginate(15);
        return view('vendor.multiauth.admin.orders.index',compact('orders'))
                    ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menuItems = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        return view('vendor.multiauth.admin.orders.create',compact('menuItems','personalizars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //item del menu personalizado
        if($request->tipo === 'personalizado'){

        $id_user_registra_compra = Auth::user()->id; 
        $nombre_registra_compra = Auth::user()->name;
        $estado = 'Pendiente';
        $seccion = 'Administración';
        $precio_item = 2000;
        $titulo = 'Sushi Personalizado';

        $request->validate([

            'esencial' => 'required',
            'principal' => 'required',
            'secundario1' => 'required',
            'secundario2' => 'required',
            'envoltura' => 'required',
            'cantidad' => 'required',
            'nombreRetira' => 'required|min:2',
            'telefono' => 'required|min:5',
            'fechaEntrega' => 'required|after:yesterday'

        ]);

        $cantidad = $request->cantidad;
        $precio = $precio_item * $cantidad;

        $fecha_entrega = Carbon::parse($request->fechaEntrega);


        //registrar el pedido
        $pedido = new Order;
        $pedido->id_user_registra_compra = $id_user_registra_compra;
        $pedido->nombre_registra_compra = $nombre_registra_compra;
        $pedido->nombre_retira = $request->nombreRetira;
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

        //registrar el menu personalizado en la tabla menu
        $menu = new Menu;
        $menu->titulo = 'Sushi Personalizado';
        $menu->descripcion = 'Descripcion';
        $menu->precio = 2000;
        $menu->esencial = $request->esencial;
        $menu->principal = $request->principal;
        $menu->secundario1 = $request->secundario1;
        $menu->secundario2 = $request->secundario2;
        $menu->envoltura = $request->envoltura;
        $menu->save();

        //registrar el menu de arriba en la tabla pedidos-menu
        $pedido_menuItem = new Order_MenuItem;
        $pedido_menuItem->id_menu_item = $menu->id;  //item que se eligio del menu
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
        
        return view('vendor.multiauth.admin.orders.show',compact('order','menuItems','menuItemsLists','personalizars'));


        }//end if personalizar

        //item de menu estandar(el que viene de la base de datos)
        if($request->tipo === 'estandar'){
    
        $id_user_registra_compra = Auth::user()->id; 
        $nombre_registra_compra = Auth::user()->name;
        $estado = 'Pendiente';
        $seccion = 'Administración';

        $request->validate([

            'menuItem' => 'required',
            'cantidad' => 'required',
            'nombreRetira' => 'required|min:2',
            'telefono' => 'required|min:5',
            'fechaEntrega' => 'required|after:yesterday'

        ]);

        //crear pedido cuando no existe uno previo
        $titulo = DB::table('menus')->select('titulo')->where('id',$request->menuItem)->first()->titulo;

        $precio_item = DB::table('menus')->select('precio')->where('id',$request->menuItem)->first()->precio;

        $cantidad = $request->cantidad;
        $precio = $precio_item * $cantidad;

        $fecha_entrega = Carbon::parse($request->fechaEntrega);

        $pedido = new Order;
        $pedido->id_user_registra_compra = $id_user_registra_compra;
        $pedido->nombre_registra_compra = $nombre_registra_compra;
        $pedido->nombre_retira = $request->nombreRetira;
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
        $pedido_menuItem->id_menu_item = $request->menuItem;  //item que se eligio del menu
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
        
        return view('vendor.multiauth.admin.orders.show',compact('order','menuItems','menuItemsLists','personalizars'));

        } //termino if estandar
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get();

        return view('vendor.multiauth.admin.orders.show',compact('order','menuItems','menuItemsLists','personalizars'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();

        return redirect()->route('orders.index')

                        ->with('success','Pedido Eliminado Exitosamente');
    }


    public function agregarItem(Request $request)
    {
        if($request->tipo === 'personalizado'){
        
        $precio_item = 2000;
        $titulo = 'Sushi Personalizado';

        $request->validate([

        'esencial' => 'required',
        'principal' => 'required',
        'secundario1' => 'required',
        'secundario2' => 'required',
        'envoltura' => 'required',
        'cantidad' => 'required',
        ]);

        $cantidad = $request->cantidad;
        $agregarPrecio = $precio_item * $cantidad;

        //registrar el menu personalizado en la tabla menu
        $menu = new Menu;
        $menu->titulo = $titulo;
        $menu->descripcion = 'Descripcion';
        $menu->precio = 2000;
        $menu->esencial = $request->esencial;
        $menu->principal = $request->principal;
        $menu->secundario1 = $request->secundario1;
        $menu->secundario2 = $request->secundario2;
        $menu->envoltura = $request->envoltura;
        $menu->save();

        //registrar el menu de arriba en la tabla pedidos-menu
        $pedido_menuItem = new Order_MenuItem;
        $pedido_menuItem->id_menu_item = $menu->id;  //item que se eligio del menu
        $pedido_menuItem->titulo = $titulo;
        $pedido_menuItem->cantidad = $cantidad;
        $pedido_menuItem->precio = $precio_item;
        $pedido_menuItem->id_pedido = $request->order_id;;  //id del pedido de arriba
        $pedido_menuItem->save();

        //actualizar el precio
        $precio_total_sin_descuento = DB::table('orders')->select('precio_total_sin_descuento')->where('id',$request->order_id)->first()->precio_total_sin_descuento;
        $nuevo_precio_total_sin_descuento = $precio_total_sin_descuento + $agregarPrecio;

        $actualizarPedido = Order::find($request->order_id);
        $actualizarPedido->precio_total_sin_descuento = $nuevo_precio_total_sin_descuento;

        if($actualizarPedido->descuento_aplicado == true){
        
        $porcentaje = $actualizarPedido->descuento / 100;
        $agregar_precio_con_descuento = $agregarPrecio - ($agregarPrecio * $porcentaje);

        $actualizarPedido->precio_total_sin_descuento = $nuevo_precio_total_sin_descuento;
        $actualizarPedido->precio_total_con_descuento = $actualizarPedido->precio_total_con_descuento + $agregar_precio_con_descuento;


        }else{
            $actualizarPedido->precio_total_sin_descuento = $nuevo_precio_total_sin_descuento;
            $actualizarPedido->precio_total_con_descuento = $nuevo_precio_total_sin_descuento;
        }

        $actualizarPedido->save();
        

        //retornar con los strings
        $order = DB::table('orders')->where('id',$request->order_id)->first();
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get();
        
        return view('vendor.multiauth.admin.orders.show',compact('order','menuItems','menuItemsLists','personalizars'));

        }//termino if personalizado


        if($request->tipo === 'estandar'){
        //Agregar item del menu estandar a un pedido previamente creado 
        $request->validate([

            'menuItem' => 'required',
            'cantidad' => 'required',


        ]);
        
        $titulo = DB::table('menus')->select('titulo')->where('id',$request->menuItem)->first()->titulo;
        $precio_item = DB::table('menus')->select('precio')->where('id',$request->menuItem)->first()->precio;
        $cantidad = $request->cantidad;
        $agregarPrecio = $precio_item * $cantidad;


        $nuevoItem = new Order_MenuItem;
        $nuevoItem->id_menu_item = $request->menuItem;
        $nuevoItem->titulo = $titulo;
        $nuevoItem->cantidad = $cantidad;
        $nuevoItem->precio =  $precio_item;
        $nuevoItem->id_pedido = $request->order_id;
        $nuevoItem->save();
    

        //actualizar precio si es con o sin descuento
        $precio_total_sin_descuento = DB::table('orders')->select('precio_total_sin_descuento')->where('id',$request->order_id)->first()->precio_total_sin_descuento;
        $nuevo_precio_total_sin_descuento = $precio_total_sin_descuento + $agregarPrecio;
        

        $actualizarPedido = Order::find($request->order_id);
        $actualizarPedido->precio_total_sin_descuento = $nuevo_precio_total_sin_descuento; 

   
       if($actualizarPedido->descuento_aplicado == true){
        
        $porcentaje = $actualizarPedido->descuento / 100;
        $agregar_precio_con_descuento = $agregarPrecio - ($agregarPrecio * $porcentaje);

        $actualizarPedido->precio_total_sin_descuento = $nuevo_precio_total_sin_descuento;
        $actualizarPedido->precio_total_con_descuento = $actualizarPedido->precio_total_con_descuento + $agregar_precio_con_descuento;


        }else{
            $actualizarPedido->precio_total_sin_descuento = $nuevo_precio_total_sin_descuento;
            $actualizarPedido->precio_total_con_descuento = $nuevo_precio_total_sin_descuento;
        }

        $actualizarPedido->save();



        //retornar con los strings
        $order = DB::table('orders')->where('id',$request->order_id)->first();
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get();
        
        return view('vendor.multiauth.admin.orders.show',compact('order','menuItems','menuItemsLists','personalizars'));

        }// termino if estandar
        
    }

    public function quitarItem(Request $request)
    {   
        
        $precioItem = DB::table('orders_menuItems')->where('id',$request->menuItem_id)
                            ->where('id_pedido',$request->order_id)->first()->precio;

        $cantidad = DB::table('orders_menuItems')->where('id',$request->menuItem_id)
                            ->where('id_pedido',$request->order_id)->first()->cantidad;


        $actualizarPedido = DB::table('orders_menuItems')->where('id',$request->menuItem_id)
                            ->where('id_pedido',$request->order_id)->delete();        

        //actualizar precio
        $quitarPrecio = $precioItem * $cantidad;

        $actualizarPrecioPedido = Order::find($request->order_id);

        if($actualizarPrecioPedido->descuento_aplicado == true){
            $porcentaje = $actualizarPrecioPedido->descuento / 100;
            $quitarPrecioConDescuento = $quitarPrecio - ($quitarPrecio * $porcentaje);

            $actualizarPrecioPedido->precio_total_sin_descuento = $actualizarPrecioPedido->precio_total_sin_descuento - $quitarPrecio;
            $actualizarPrecioPedido->precio_total_con_descuento = $actualizarPrecioPedido->precio_total_con_descuento - $quitarPrecioConDescuento;

        }else{
            $actualizarPrecioPedido->precio_total_sin_descuento = $actualizarPrecioPedido->precio_total_sin_descuento - $quitarPrecio;
            $actualizarPrecioPedido->precio_total_con_descuento = $actualizarPrecioPedido->precio_total_con_descuento - $quitarPrecio;

        }

        $actualizarPrecioPedido->save();

        //retornar

        $order = DB::table('orders')->where('id',$request->order_id)->first();
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get();
        
        return view('vendor.multiauth.admin.orders.show',compact('order','menuItems','menuItemsLists','personalizars'));

        

    }
    public function quitarItem2(Request $request)
    {

    }


}
