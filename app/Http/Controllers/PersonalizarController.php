<?php

namespace App\Http\Controllers;

use App\Personalizar;
use Illuminate\Http\Request;
use App\Ingredient;
use Illuminate\Support\Facades\DB;

class PersonalizarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalizars = DB::table('ingredients')->select('name', 'categoria')->get();

  
        return view('personalizars.index',compact('personalizars'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function show(Personalizar $personalizar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function edit(Personalizar $personalizar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personalizar $personalizar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personalizar  $personalizar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personalizar $personalizar)
    {
        //
    }
}
