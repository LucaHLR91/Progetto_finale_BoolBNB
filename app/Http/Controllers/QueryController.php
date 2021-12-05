<?php


// Torna i servizi disponibili per appartmento 

// $services = DB::table('apartment_service')
//             ->join('services', 'apartment_service.service_id', '=', 'services.id')
//             ->join('apartments', 'apartment_service.apartment_id', '=', 'apartments.id')
//             ->select('apartments.id','services.service_name', 'services.id')
//             ->whereIn('apartment_id', [1,2])
//             ->get();

namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Controllers\Admin\GeoFunction;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{

    public function index(Request $request)
    {
        if ($request->services){
            $id_service = $request->services;
            $apartmentByServices = $this->queryService($id_service);

        }
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

        $id_apartments = array();
        foreach ($apartments as $apartment) {
            $id_apartments[] = $apartment->id;
        }

        $services = Service::all();

        return view('guest.home.search', compact('apartments', 'coordinates', 'id_apartments', 'services'));

        return view('guest.home.search', compact('apartments', 'coordinates'));

    }

    // Functio che filtra gli appartamenti per i servizi 

    public function queryService($id_service)
    {
            
        $apartmentByServices = DB::table('apartment_service')
        ->join('services', 'apartment_service.service_id', '=', 'services.id')
        ->join('apartments', 'apartment_service.apartment_id', '=', 'apartments.id')
        ->select('apartments.id', 'services.service_name', 'services.id')
        ->whereIn('apartment_service.service_id', [$id_service])
        ->get();

        return $apartmentByServices;

    }

   

}
