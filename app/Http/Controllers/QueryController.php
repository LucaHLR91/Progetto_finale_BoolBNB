<?php
namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Controllers\Admin\GeoFunction;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{

    public function searchController(Request $request)

    {
        // dd($request->all());
       
        if ($request->has('service')){
            $id_service = $request->services;
            $apartmentByServices = $this->getApartmentByServices($id_service);
            $geocoder = new GeoFunction(env('TOMTOM_API_KEY'));
            $coordinates = $geocoder->geocodeAddress($request->city);
            // Filtro gli appartamenti che soddisfano i filtri
            // remove service from request and save in $data
            $data = $request->except('services');
            $apartments = Apartment::filter($data)->get();
            // Trovo gli appartamenti che sono vicini alla posizione
            $nearby = Apartment::radius($coordinates['latitude'], $coordinates['longitude'], 20)->get();

            // Filtro gli appartamenti che soddisfano i filtri
            $apartments = $apartments->intersect($apartmentByServices);
            $nearby = $nearby->intersect($apartmentByServices);
            $apartments = $apartments->intersect($nearby);
            


        }
        else{
            $geocoder = new GeoFunction(env('TOMTOM_API_KEY'));
            $coordinates = $geocoder->geocodeAddress($request->city);
            $geoapartments = Apartment::radius($coordinates['latitude'], $coordinates['longitude'], $request->radius)->get();
            // Filtro gli appartamenti che soddisfano i filtri
            $data = $request->except('services');
            $apartments = Apartment::ignoreRequest(['radius'])->filter($data)->get();
            // save common apartments in $apartments
            $apartments = $apartments->intersect($geoapartments);

        }

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


    

    }

    public function getApartmentByServices($id_service)
    {

        $apartmentByServices = DB::table('apartment_service')
            ->join('services', 'apartment_service.service_id', '=', 'services.id')
            ->join('apartments', 'apartment_service.apartment_id', '=', 'apartments.id')
            ->select('apartments.id', 'services.service_name', 'services.id')
            ->whereIn('apartment_service.service_id', [$id_service])
            ->get();

        return response()->json($apartmentByServices);
    }

    public function getServicesByApartment(Request $request)
    {
        $apartment_id = $request->input('apartment_id');
        $services = DB::table('apartment_service')
            ->join('services', 'apartment_service.service_id', '=', 'services.id')
            ->join('apartments', 'apartment_service.apartment_id', '=', 'apartments.id')
            ->select('apartments.id', 'services.service_name', 'services.id')
            ->where('apartment_id', $apartment_id)
            ->get();
        return response()->json($services);
    }

}
