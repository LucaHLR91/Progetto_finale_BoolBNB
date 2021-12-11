<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;


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

      $apartments = Apartment::where('user_id', auth()->user()->id)->get();
      $number_of_apartments = count($apartments);
      $date = Carbon::now()->addDays(3);
        $apartment_sponsorship = DB::table('apartment_sponsorship')
                                ->where('apartment_id', $id)
                                ->where('end_date', '>', $date)
        ->get();

    return view('admin.home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
