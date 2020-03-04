<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailchimp;

class UnsubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('unsubscribe');
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
        //
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


    public function unsubscribe(Request $request)
    {
        //
        $request->validate([

            'email' => 'required|email|regex:/^\w+(\.\w+)*@\w+(\.\w+)+$/',

        ]);

        $listId = 'b022c2c7c4';
        $email = $request->email;

        if(!Mailchimp::check($listId, $email)){

            return redirect()->route('unsubscribe')
                             ->withErrors('El email ingresado no se encuentra registrado en nuestro sistema newsletter'); 
        }


        Mailchimp::unsubscribe($listId, $email);

        return redirect()->route('unsubscribe')
                        ->with('success','Has eliminado tu email de nuestro sistema newsletter');

    }
}
