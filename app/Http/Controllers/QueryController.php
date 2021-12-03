<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

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
            'city' => $city,
        ];

        if (!empty($beds) && !empty($rooms) && !empty($city)) {
            $apartments = Apartment::filter(
                ['beds' => ['>', $beds]],
                ['rooms' => ['>', $rooms]],
                ['city' => $city])->get();
        } elseif (!empty($beds) && !empty($city)) {
            $apartments = Apartment::filter(
                ['beds' => ['>', $beds]],
                ['city' => $city]
            )->get();
        } elseif (!empty($rooms) && !empty($city)) {
            $apartments = Apartment::filter(
                ['rooms' => ['>', $rooms]],
                ['city' => $city]
            )->get();
        } elseif (!empty($city)) {
            $apartments = Apartment::filter(
                ['city' => $city]
            )->get();
        } else {
            // Inserire app sponsorizzati
            $apartments = Apartment::all();
        }

    

        $coordinates = array();
        foreach ($apartments as $apartment) {
            $coordinates[] = array(
                'latitude' => $apartment->latitude,
                'longitude' => $apartment->longitude,
            );
        }

        return view('guest.home.search', compact('apartments', 'coordinates', 'parameters'));

    }

}
