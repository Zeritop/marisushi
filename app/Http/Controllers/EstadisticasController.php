<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_MenuItem;
use App\Menu;
use App\Discount;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class EstadisticasController extends Controller
{
    //
    public function __construct()
    {
        //
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }

    public function index(Request $request)
    {
        //

        $mes_estado = $request->mes_estado;
        $ano_estado = $request->ano_estado;


        //dd($date);

        $contador_estados = DB::table('orders')
            ->select(DB::raw('count(estado) as contador, estado'))
            ->whereYear('orders.created_at', $ano_estado)
            ->whereMonth('orders.created_at', $mes_estado)
            ->groupBy('estado')
            ->get();
            //dd($contador_estados);



        $contador_pedidos = DB::table('orders')
            ->join('orders_menuItems', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(titulo) as contador, titulo'))
            ->where('orders.estado', '=', 'Entregado')
            ->whereYear('orders.created_at', $ano_estado)
            ->whereMonth('orders.created_at', $mes_estado)
            ->groupBy('titulo')
            ->get();
  //dd($contador_pedidos);

       $contador_esencial = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->join('orders', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(esencial) as contador, esencial'))
           ->where('orders.estado', '=', 'Entregado')
           ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->where('menus.titulo', '=', 'Sushi Personalizado: 10 piezas')
            ->orWhere('menus.titulo', '=', 'Handroll Personalizado')
            ->groupBy('esencial')
            ->get();
            //dd($contador_ingredientes);

        $contador_principal = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->join('orders', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(principal) as contador, principal'))
            ->where('orders.estado', '=', 'Entregado')
            ->where('menus.titulo', '=', 'Sushi Personalizado: 10 piezas')
            ->orWhere('menus.titulo', '=', 'Handroll Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('principal')
            ->get();
            //dd($contador_ingredientes);

        $contador_secundario1 = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->join('orders', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(secundario1) as contador, secundario1'))
            ->where('orders.estado', '=', 'Entregado')
            ->where('menus.titulo', '=', 'Sushi Personalizado: 10 piezas')
            ->orWhere('menus.titulo', '=', 'Handroll Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('secundario1')
            ->get();
            //dd($contador_ingredientes);

        $contador_secundario2 = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->join('orders', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(secundario2) as contador, secundario2'))
            ->where('orders.estado', '=', 'Entregado')
            ->where('menus.titulo', '=', 'Sushi Personalizado: 10 piezas')
            ->orWhere('menus.titulo', '=', 'Handroll Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('secundario2')
            ->get();
            //dd($contador_ingredientes);

        $contador_envoltura = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->join('orders', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(envolturaExterna) as contador, envolturaExterna'))
            ->where('orders.estado', '=', 'Entregado')
            ->where('menus.titulo', '=', 'Sushi Personalizado: 10 piezas')
            ->orWhere('menus.titulo', '=', 'Handroll Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('envolturaExterna')
            ->get();
            //dd($contador_ingredientes);

            $contador_envoltura1 = DB::table('menus')
                ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
                ->join('orders', 'orders.id', '=', 'orders_menuItems.id_pedido')
                ->select(DB::raw('count(envolturaInterna) as contador, envolturaInterna'))
                ->where('orders.estado', '=', 'Entregado')
                ->where('menus.titulo', '=', 'Sushi Personalizado: 10 piezas')
                ->orWhere('menus.titulo', '=', 'Handroll Personalizado')
                ->whereYear('menus.created_at', $ano_estado)
                ->whereMonth('menus.created_at', $mes_estado)
                ->groupBy('envolturaInterna')
                ->get();

        $contador_ventas = DB::table('orders')
            ->select(DB::raw('count(estado) as contador, estado'))
            ->where('estado', '=', 'Entregado')
            ->whereYear('orders.created_at', $ano_estado)
            ->whereMonth('orders.created_at', $mes_estado)
            ->groupBy('estado')
            ->get();


        $dia_estacion = '21';
        $ano_estacion = $request->ano_estacion;
        $contador_ventas_estaciones = Order::orderBy('created_at', 'DESC');
        $contador_pedidos_estaciones = Order::orderBy('created_at', 'DESC');


           if($request->select_estacion == 01){

            $mes_estacion1 = '09';
            $mes_estacion2 = 12;

            $fecha1 = $ano_estacion.'-'.$mes_estacion1.'-'.$dia_estacion;

            $fecha2 = $ano_estacion.'-'.$mes_estacion2.'-'.$dia_estacion;

            $contador_ventas_estaciones = DB::table('orders')
            ->select(DB::raw('count(estado) as contador, estado'))
            ->where('estado', '=', 'Entregado')
            ->whereBetween('created_at', [$fecha1, $fecha2])
            ->groupBy('estado')
            ->get();

            $contador_pedidos_estaciones = DB::table('orders')
            ->join('orders_menuItems', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(titulo) as contador, titulo'))
            ->where('orders.estado', '=', 'Entregado')
            ->whereBetween('orders.created_at', [$fecha1, $fecha2])
            ->groupBy('titulo')
            ->get();
            //dd($fecha2, $fecha1);
            return view('vendor.multiauth.admin.estadisticas.index',compact('contador_estados', 'contador_pedidos', 'contador_esencial', 'contador_principal', 'contador_secundario1', 'contador_secundario2', 'contador_envoltura', 'contador_envoltura1', 'contador_ventas', 'contador_ventas_estaciones', 'contador_pedidos_estaciones'));
        }

        if($request->select_estacion == 02){

            $mes_estacion1 = 12;
            $mes_estacion2 = 03;

            $fecha1 = $ano_estacion.'-'.$mes_estacion1.'-'.$dia_estacion;

            $ano_estacion += 1;

            $fecha2 = $ano_estacion.'-'.$mes_estacion2.'-'.$dia_estacion;

            $contador_ventas_estaciones = DB::table('orders')
            ->select(DB::raw('count(estado) as contador, estado'))
            ->where('estado', '=', 'Entregado')
            ->whereBetween('created_at', [$fecha1, $fecha2])
            ->groupBy('estado')
            ->get();

            $contador_pedidos_estaciones = DB::table('orders')
            ->join('orders_menuItems', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(titulo) as contador, titulo'))
            ->where('orders.estado', '=', 'Entregado')
            ->whereBetween('orders.created_at', [$fecha1, $fecha2])
            ->groupBy('titulo')
            ->get();
            //dd($fecha2, $fecha1);
            return view('vendor.multiauth.admin.estadisticas.index',compact('contador_estados', 'contador_pedidos', 'contador_esencial', 'contador_principal', 'contador_secundario1', 'contador_secundario2', 'contador_envoltura', 'contador_envoltura1', 'contador_ventas', 'contador_ventas_estaciones', 'contador_pedidos_estaciones'));
        }
        if($request->select_estacion == 03){

            $mes_estacion1 = 03;
            $mes_estacion2 = 06;

            $fecha1 = $ano_estacion.'-'.$mes_estacion1.'-'.$dia_estacion;

            $fecha2 = $ano_estacion.'-'.$mes_estacion2.'-'.$dia_estacion;

            $contador_ventas_estaciones = DB::table('orders')
            ->select(DB::raw('count(estado) as contador, estado'))
            ->where('estado', '=', 'Entregado')
            ->whereBetween('created_at', [$fecha1, $fecha2])
            ->groupBy('estado')
            ->get();

            $contador_pedidos_estaciones = DB::table('orders')
            ->join('orders_menuItems', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(titulo) as contador, titulo'))
            ->where('orders.estado', '=', 'Entregado')
            ->whereBetween('orders.created_at', [$fecha1, $fecha2])
            ->groupBy('titulo')
            ->get();
            //dd($fecha2);
            return view('vendor.multiauth.admin.estadisticas.index',compact('contador_estados', 'contador_pedidos', 'contador_esencial', 'contador_principal', 'contador_secundario1', 'contador_secundario2', 'contador_envoltura', 'contador_envoltura1', 'contador_ventas', 'contador_ventas_estaciones', 'contador_pedidos_estaciones'));
        }
        if($request->select_estacion == 04){

            $mes_estacion1 = 06;
            $mes_estacion2 = '09';

            $fecha1 = $ano_estacion.'-'.$mes_estacion1.'-'.$dia_estacion;

            $fecha2 = $ano_estacion.'-'.$mes_estacion2.'-'.$dia_estacion;

            $contador_ventas_estaciones = DB::table('orders')
            ->select(DB::raw('count(estado) as contador, estado'))
            ->where('estado', '=', 'Entregado')
            ->whereBetween('created_at', [$fecha1, $fecha2])
            ->groupBy('estado')
            ->get();

            $contador_pedidos_estaciones = DB::table('orders')
            ->join('orders_menuItems', 'orders.id', '=', 'orders_menuItems.id_pedido')
            ->select(DB::raw('count(titulo) as contador, titulo'))
            ->where('orders.estado', '=', 'Entregado')
            ->whereBetween('orders.created_at', [$fecha1, $fecha2])
            ->groupBy('titulo')
            ->get();
            //dd($fecha2);
            return view('vendor.multiauth.admin.estadisticas.index',compact('contador_estados', 'contador_pedidos', 'contador_esencial', 'contador_principal', 'contador_secundario1', 'contador_secundario2', 'contador_envoltura', 'contador_envoltura1', 'contador_ventas', 'contador_ventas_estaciones', 'contador_pedidos_estaciones'));
        }





        return view('vendor.multiauth.admin.estadisticas.index',compact('contador_estados', 'contador_pedidos', 'contador_esencial', 'contador_principal', 'contador_secundario1', 'contador_secundario2', 'contador_envoltura', 'contador_envoltura1', 'contador_ventas', 'contador_ventas_estaciones', 'contador_pedidos_estaciones'));
    }

}
