<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Sale;


class SaleController extends Controller
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
        //
        $ventas = Sale::orderBy('created_at', 'ASC')->paginate(15);

        return view('vendor.multiauth.admin.sales.index',compact('ventas'))

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

    public function generarInforme(Request $request)
    {
        //
        $request->validate([

            'year' => 'required',

        ]);

        if($request->month === NULL){
            $ventas = DB::table('sales')->whereYear('created_at', $request->year)->get();

        }else{
            $ventas = DB::table('sales')->whereYear('created_at', $request->year)
                                        ->whereMonth('created_at', $request->month)->get();
        }
        $pdf = PDF::loadView('pdf.sales',compact('ventas'));

        return $pdf->download('informe-ventas.pdf');

    }
}
