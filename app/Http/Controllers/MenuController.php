<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }

    public function index()
    {
        $menus = Menu::orderBy('created_at', 'ASC')
        ->paginate(5);
  
        return view('vendor.multiauth.admin.menus.index',compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.multiauth.admin.menus.create');
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
            'precio' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'foto' => 'required',
        ]);

        $menu = new Menu;
        $menu = new Menu;
        $menu->foto = Storage::putFile('public', $request->file('foto'));
        $menu->foto = basename(Storage::putFile('public', $request->file('foto')));   
        $menu->titulo = $request->titulo;
        $menu->precio = $request->precio;
        $menu->descripcion = $request->descripcion;
        $menu->save();    
       
    
        
        return redirect()->route('menus.index')
                        ->with('success','Menu creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('vendor.multiauth.admin.menus.show',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('vendor.multiauth.admin.menus.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
             $request->validate([

            'titulo' => 'required',
            
            'descripcion' => 'required',
            'precio' => 'required',
        ]);

  

        $menu->update($request->all());

  

        return redirect()->route('menus.index')

                        ->with('success','Menu Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
         $menu->delete();

  

        return redirect()->route('menus.index')

                        ->with('success','Menu Eliminado Exitosamente');
    }
}
