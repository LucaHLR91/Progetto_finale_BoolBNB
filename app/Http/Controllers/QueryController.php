<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class QueryController extends Controller
{

    public function index(Request $request)
    {
        

        $apartments = Apartment::filter($request->all())->get();
        

        $coordinates = array();
        foreach ($apartments as $apartment) {
            $coordinates[] = array(
                'latitude' => $apartment->latitude,
                'longitude' => $apartment->longitude,
            );
        }

        return view('guest.home.search', compact('apartments', 'coordinates'));

    }

}
