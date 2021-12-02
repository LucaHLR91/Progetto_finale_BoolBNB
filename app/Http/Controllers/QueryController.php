<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Service;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    
    public function index(Request $request)
    {
        
        $beds = $request->beds;
        $rooms = $request->rooms;
        $city = $request->city;

        // CREO UN ARRAY PER I PARAMETRI DI RICERCA SCELTI DALL'UTENTE

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
        $request = $request->all();
        // RIPULITO IL DATO PASSATO LO DIVIDIAMO
        $id_apartments = $request['id_apartments'];
        $id_services = $request['id_services'];

        // PRENDIAMO DALLA TABELLA SERVIZI L'ID E IL NOME DEI SERVIZI
        $services = DB::table('services')
        ->select('id', 'service_name')
        ->get();

        // CREO VARIABILE D'APPOGGIO PER I RISULTATI
        $results = [];

        foreach ($id_apartments as $id_apartment) {
            // for every service
            foreach ($id_services as $id_service) {
                // select on table services_apartments
                $apartments = DB::table('apartment_service')
                    ->select('apartment_id', 'service_id')
                    ->where('apartment_id', '=', $id_apartment)
                    ->where('service_id', '=', $id_service)
                    ->get();
                
                foreach ($apartments as $apartment) {
                    $results[] = $apartment->apartment_id;
                }
            }
        }

        $coordinates = array();
        $apartments = array();
        foreach ($results as $apartment_id) {
            $apartment = Apartment::find($apartment_id);
            $apartments[] = $apartment;
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

        $id_apartments = $results;

        return view('guest.home.search' , compact('apartments', 'coordinates', 'services', 'id_apartments'));
    }
}
