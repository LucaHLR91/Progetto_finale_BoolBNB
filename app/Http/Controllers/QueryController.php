<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\GeoFunction;

class QueryController extends Controller
{

    public function index(Request $request)
    {

        // Test radius

        $apartments = Apartment::radius(42.56, 12.65, 20)->get();
        //::filter($request->all())->get();
        //$apartments = Apartment::filter($request->all())->get();
        

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
