<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*     public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $apartment_sponsorship = DB::table('apartment_sponsorship')
        ->select('apartment_id')
        ->where('end_date', '>=', date('Y-m-d'))
        ->get();

        $apartments_id = $apartment_sponsorship->pluck('apartment_id');
        $apartments = Apartment::whereIn('id', $apartments_id)->get();


        return view('Guest.home', compact('apartments'));
        // return view('Guest.home');
    }
}
