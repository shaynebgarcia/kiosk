<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Kiosk;
use App\Product;
use App\Stock;
use App\Order;
use App\OrderProcessing;

use Carbon\Carbon;

class KioskController extends Controller
{
    public function __construct(Request $request)
    {
        $this->company = session()->get('company_id');
        $this->kiosk = session()->get('kiosk_id');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::findorFail($this->company);
        $kiosk = Kiosk::findorFail($this->kiosk);

        $products = Product::all();
        $stocks = Stock::where('kiosk_id', $this->kiosk)->get();

        return view('kiosk.pos.index', compact('company', 'kiosk', 'products', 'stocks'));
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
     * @param  \App\Kiosk  $kiosk
     * @return \Illuminate\Http\Response
     */
    public function show(Kiosk $kiosk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kiosk  $kiosk
     * @return \Illuminate\Http\Response
     */
    public function edit(Kiosk $kiosk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kiosk  $kiosk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kiosk $kiosk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kiosk  $kiosk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kiosk $kiosk)
    {
        //
    }
}
