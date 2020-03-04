<?php

namespace App\Http\Controllers;

use App\Product;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(15);

        return view('vendor.multiauth.admin.products.index',compact('products'))

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
        $medidas = DB::table('measurements')->select('name')->get();
        $ingredients = DB::table('ingredients')->select('name')->get();
        return view('vendor.multiauth.admin.products.create',compact('ingredients','medidas'));
                    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            

            $request->validate([
            'name' => 'required',
            'cantidad' => 'required|min:0',
            'unidad_medida' => 'required',
            'precio_inicial' => 'required',
            'precio_actual' => 'required',

        ]);


        Product::create($request->all());
   
        return redirect()->route('products.index')

                        ->with('success','Producto creado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('vendor.multiauth.admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $medidas = DB::table('measurements')->select('name')->get();
        return view('vendor.multiauth.admin.products.edit',compact('product','medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
            $request->validate([
            'cantidad' => 'required|numeric|min:0',
            'unidad_medida' => 'required',
            'precio_inicial' => 'required',
            'precio_actual' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')

                        ->with('success','Producto Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

  

        return redirect()->route('products.index')

                        ->with('success','Producto Eliminado Exitosamente');

    }
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }
}
