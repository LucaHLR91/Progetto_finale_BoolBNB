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

        if ($request->has('services')) {

            $id_apartments = $request->id_apartments;
            $id_services = $request->services;

            $apartments = DB::table('apartment_service')
                ->select('apartment_id', 'service_id')
                ->whereIn('apartment_id', $id_apartments)
                ->whereIn('service_id', $id_services)
                ->get();

            // create ARRAY OF COORDINATES OF APARTMENTS
            $coordinates = array();

            foreach ($apartments as $apartment) {
                $apartment = Apartment::find($apartment->apartment_id);
                $coordinates[] = array(
                    'latitude' => $apartment["latitude"],
                    'longitude' => $apartment["longitude"],
                );
            }

        } else {
            // $geocoder = new GeoFunction(env('TOMTOM_API_KEY'));
            $geocoder = new GeoFunction('6y2OQWGA2Mzh58h8WsuNYObnNsRijOlr');
            $coordinates = $geocoder->geocodeAddress($request->city);
            $geoapartments = Apartment::radius($coordinates['latitude'], $coordinates['longitude'], $request->radius)->get();
            // Filtro gli appartamenti che soddisfano i filtri
            $data = $request->except('services');
            $apartments = Apartment::ignoreRequest(['radius'])->filter($data)->get();
            // save common apartments in $apartments
            $apartments = $apartments->intersect($geoapartments);
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


        }
        $services = Service::all();


        return view('guest.home.search', compact('apartments', 'coordinates', 'id_apartments', 'services'));

    }

    // function to filter apartments_id  by services

    public function getApartmentByServices($apartments_id, $id_service)
    {

        $apartmentByServices = DB::table('apartment_service')
            ->join('services', 'apartment_service.service_id', '=', 'services.id')
            ->join('apartments', 'apartment_service.apartment_id', '=', 'apartments.id')
            ->select('apartments.id', 'services.service_name')
            ->whereIn('apartment_service.service_id', [$id_service])
            ->whereIn('apartment_service.apartment_id', [$apartments_id])
            ->get();

        return $apartmentByServices;
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
