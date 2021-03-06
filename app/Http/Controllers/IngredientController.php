<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
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
        $ingredients = Ingredient::orderBy('created_at', 'ASC')->paginate(15);

        return view('vendor.multiauth.admin.ingredients.index',compact('ingredients'))

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
        $categorys = DB::table('categorys')->select('name')->get();
        return view('vendor.multiauth.admin.ingredients.create',compact('categorys'));
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
        $request->validate([

            'name' => 'required',
            'categoria' => 'required'

        ]);


         

        Ingredient::create($request->all());

        return redirect()->route('ingredients.index')
                        ->with('success','Producto creado exitosamente.');
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
    public function edit(Ingredient $ingredient)
    {
        //
        $categorys = DB::table('categorys')->select('name')->get();
        return view('vendor.multiauth.admin.ingredients.edit',compact('ingredient','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        //
        $request->validate([

            'name' => 'required',

        ]);

  

        $ingredient->update($request->all());

  

        return redirect()->route('ingredients.index')

                        ->with('success','Ingrediente Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        //
        $ingredient->delete();

  

        return redirect()->route('ingredients.index')

                        ->with('success','Ingrediente Eliminado Exitosamente');
    }


}
