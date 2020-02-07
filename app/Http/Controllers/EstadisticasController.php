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
            ->whereYear('orders.created_at', $ano_estado)
            ->whereMonth('orders.created_at', $mes_estado)
            ->groupBy('titulo')
            ->get();
  //dd($contador_pedidos);
        
       $contador_esencial = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->select(DB::raw('count(esencial) as contador, esencial'))
           ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->where('menus.titulo', '=', 'Sushi Personalizado')
            ->groupBy('esencial')
            ->get(); 
            //dd($contador_ingredientes);
        
        $contador_principal = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->select(DB::raw('count(principal) as contador, principal'))
            ->where('menus.titulo', '=', 'Sushi Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('principal')
            ->get(); 
            //dd($contador_ingredientes);
        
        $contador_secundario1 = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->select(DB::raw('count(secundario1) as contador, secundario1'))
            ->where('menus.titulo', '=', 'Sushi Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('secundario1')
            ->get(); 
            //dd($contador_ingredientes);
        
        $contador_secundario2 = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->select(DB::raw('count(secundario2) as contador, secundario2'))
            ->where('menus.titulo', '=', 'Sushi Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('secundario2')
            ->get(); 
            //dd($contador_ingredientes);
        
        $contador_envoltura = DB::table('menus')
            ->join('orders_menuItems' ,'menus.id', '=', 'orders_menuItems.id_menu_item')
            ->select(DB::raw('count(envoltura) as contador, envoltura'))
            ->where('menus.titulo', '=', 'Sushi Personalizado')
            ->whereYear('menus.created_at', $ano_estado)
            ->whereMonth('menus.created_at', $mes_estado)
            ->groupBy('envoltura')
            ->get(); 
            //dd($contador_ingredientes);
        
        $contador_ventas = DB::table('orders')
            ->select(DB::raw('count(estado) as contador, estado'))
            ->where('estado', '=', 'Cancelado')
            ->whereYear('orders.created_at', $ano_estado)
            ->whereMonth('orders.created_at', $mes_estado)
            ->groupBy('estado')
            ->get();
        
        return view('vendor.multiauth.admin.estadisticas.index',compact('contador_estados', 'contador_pedidos', 'contador_esencial', 'contador_principal', 'contador_secundario1', 'contador_secundario2', 'contador_envoltura', 'contador_ventas'));
    }
    
}

