<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    
    public function index(Request $request)
    {
        
        $beds = $request->beds;
        $rooms = $request->rooms;
        $city = $request->city;

        if (!empty($beds) && !empty($rooms) && !empty($city)) {
            $apartments = DB::table('apartments')
                ->where('beds', '>=', $beds)
                ->where('rooms', '>=', $rooms)
                ->where('city', '=', $city)
                ->get();
            $apartments = $apartments->sortBy('rooms');
        }
         elseif (!empty($beds) && !empty($city)) {
            $apartments = DB::table('apartments')
                ->where('beds', '>=', $beds)
                ->where('city', '=', $city)
                ->get();
                $apartments = $apartments->sortBy('beds');
        } elseif (!empty($rooms) && !empty($city)) {
            $apartments = DB::table('apartments')
                ->where('rooms', '>=', $rooms)
                ->where('city', '=', $city)
                ->get();
                $apartments = $apartments->sortBy('rooms');
        }
         elseif (!empty($city)) {
            $apartments = DB::table('apartments')
                ->where('city', '=', $city)
                ->get();
                $apartments = $apartments->sortBy('rooms');
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

        $id_apartments = array();
        foreach ($apartments as $apartment) {
            $id_apartments[] = $apartment->id;
        }

        $services = Service::all();

        return view('guest.home.search', compact('apartments', 'coordinates', 'id_apartments', 'services'));
    }

    public function queryService(Request $request) {
        $services = DB::table('services')
        ->select('id', 'service_name')
        ->get();

        dd($request);
        foreach ($request->id_apartments as $id_apartment) {
            // for every service
            foreach ($services as $service) {
                // select on table services_apartments
                $services_apartments = DB::table('services_apartments')
                    ->select('apartment_id', 'service_id')
                    ->where('apartment_id', '=', $id_apartment)
                    ->where('service_id', '=', $service->id)
                    ->get();
            }
        }

        return view('guest.home.search' , compact('services_apartments'));
    }
}
