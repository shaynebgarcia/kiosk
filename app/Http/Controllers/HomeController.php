<?php

namespace App\Http\Controllers;

use App\Company;
use App\Kiosk;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function developer()
    {

        return view('developer.index');
    }

    public function dashboard()
    {
        $company = Company::findorFail(session()->get('company_id'));
        $kiosk = Kiosk::findorFail(session()->get('kiosk_id'));

        return view('dashboard.index', compact('company', 'kiosk'));
    }

    // public function dashboard()
    // {

    //     return view('dashboard.index');
    // }
}
