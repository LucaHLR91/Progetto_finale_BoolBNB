<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    
    public function index(Request $request)
    {
        
        $beds = $request->beds;
        $rooms = $request->rooms;
        $city = ucfirst($request->city);

        $parameters = [
            'beds' => $beds,
            'rooms' => $rooms,
            'city' => $city
        ];

        if (!empty($beds) && !empty($rooms) && !empty($city)) {
            $apartments = DB::table('apartments')
                ->where('beds', '>=', $beds)
                ->where('rooms', '>=', $rooms)
                ->where('city', '=', $city)
                ->get();
        }
         elseif (!empty($beds) && !empty($city)) {
            $apartments = DB::table('apartments')
                ->where('beds', '>=', $beds)
                ->where('city', '=', $city)
                ->get();
        } elseif (!empty($rooms) && !empty($city)) {
            $apartments = DB::table('apartments')
                ->where('rooms', '>=', $rooms)
                ->where('city', '=', $city)
                ->get();
        }
         elseif (!empty($city)) {
            $apartments = DB::table('apartments')
                ->where('city', '=', $city)
                ->get();
        } else {
            // Inserire app sponsorizzati
            $apartments = DB::table('apartments')
                ->get();
        }

            // $coordinates = Apartment::all()->pluck('latitude', 'longitude')->all();

        // create an array with latidude and longitude from $apartments
        $coordinates = array();
        foreach ($apartments as $apartment) {
            $coordinates[] = array(
                'latitude' => $apartment->latitude,
                'longitude' => $apartment->longitude
            );
        }

        return view('guest.home.search', compact('apartments', 'coordinates', 'parameters'));
    }
}
