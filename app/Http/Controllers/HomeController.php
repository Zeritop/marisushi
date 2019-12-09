<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailchimp;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function subscribe(Request $request)
    {
        //
        $listId = 'b022c2c7c4';
        $email = $request->email;

        if(Mailchimp::check($listId, $email)){

            return redirect()->route('home')
                             ->withErrors('El email ya se encuentra registrado en nuestro newsletter'); 
        }
        
        Mailchimp::subscribe(
            $listId,
            $email,
            [], //    mergeFields, nombre,apellido  
            false //  confirm
            );

        return redirect()->route('home')
                        ->with('success','Email registrado en nuestro newsletter');

    }


    public function unsubscribe(Request $request)
    {
        //
        $listId = 'b022c2c7c4';
        $email = $request->email;

        if(!Mailchimp::check($listId, $email)){

            return redirect()->route('home')
                             ->withErrors('El email ingresado no se encuentra registrado en nuestro newsletter'); 
        }
        
        Mailchimp::subscribe(
            $listId,
            $email,
            [], //    mergeFields, nombre,apellido  
            false //  confirm
            );

        return redirect()->route('home')
                        ->with('success','Email registrado en nuestro newsletter');

    }

}
