<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\GeoFunction;

class QueryController extends Controller
{

    public function index(Request $request)
    {
        // Ricavo le coordinate 
        $geocoder = new GeoFunction(env('TOMTOM_API_KEY'));
        $coordinates = $geocoder->geocodeAddress($request->city);

        // Filtro gli appartamenti che soddisfano i filtri
        $apartments = Apartment::filter($request->all())->get();

        // Trovo gli appartamenti che sono vicini alla posizione
  
        $nearby = Apartment::radius($coordinates['latitude'], $coordinates['longitude'], 20)->get();
     
        // Filtro gli appartamenti che sono vicini alla posizione e che soddisfano i filtri
        $apartments = $apartments->intersect($nearby);

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
