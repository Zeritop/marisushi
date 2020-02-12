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

class HistorialController extends Controller
{
    //
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        //$orders = DB::table('orders')->where('id_user_registra_compra', Auth::user())->get();
        $orders = Order::orderBy('created_at', 'DESC')->paginate(15);
        //dd($orders, $order);
        return view('cart.historial',compact('orders'))
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
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $orders = Order::orderBy('created_at', 'ASC');
        //dd($orders);
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();
        $menuItemsLists = DB::table('menus')->where('titulo','not like','Sushi Personalizado')->get();
        $menuItems = DB::table('orders_menuItems')->where('id_pedido',$order->id)->get();
        
        //dd($personalizars, $menuItems, $menuItemsLists);

        return view('cart.verhistorial',compact('order','menuItems','menuItemsLists','personalizars'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        
    }


}
