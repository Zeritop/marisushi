<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_MenuItem;
use App\Menu;
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
        $orders = Order::orderBy('created_at', 'ASC')->paginate(5);
        return view('vendor.multiauth.admin.orders.index',compact('orders'))
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
        $menuItems = DB::table('menus')->get();
        return view('vendor.multiauth.admin.orders.create',compact('menuItems'));
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
        $nombre_registra_compra = Auth::user()->name;
        $estado = 'Pendiente';
        $seccion = 'Administración';
        $descuento_aplicado = false;
        $descuento = 0;

        $request->validate([

            'menuItem' => 'required',
            'cantidad' => 'required',
            'nombreRetira' => 'required|min:2',
            'telefono' => 'required|min:5',
            'fechaEntrega' => 'required|after:yesterday'

        ]);

        $precio = DB::table('menus')->select('precio')->where('id',$request->menuItem)->first()->precio;
        $fecha_entrega = Carbon::parse($request->fechaEntrega);

        $pedido = new Order;
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
        $pedido->precio_total_sin_descuento = $precio;
        $pedido->descuento = $descuento;
        $pedido->descuento_aplicado = $descuento_aplicado;
        $pedido->precio_total_con_descuento = $precio;
        $pedido->seccion = $seccion;
        $pedido->save();

        dd($pedido->id);
        

        return 'no se lo que paso';
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
    public function destroy($id)
    {
        //
    }
}
