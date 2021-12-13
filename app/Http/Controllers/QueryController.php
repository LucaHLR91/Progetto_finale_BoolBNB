<?php
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
        $geocoder = new GeoFunction(env('TOMTOM_API_KEY'));
        $coordinates = $geocoder->geocodeAddress($request->city);
        $geoapartments = Apartment::radius($coordinates['latitude'], $coordinates['longitude'], $request->radius)->get();
        // Filtro gli appartamenti che soddisfano i filtri
        $data = $request->except('services');
        $apartments = Apartment::ignoreRequest(['radius'])->filter($data)->get();
        // save common apartments in $apartments
        $apartments = $apartments->intersect($geoapartments);
        $coordinates = array();
        $id_apartments = array();
        foreach ($apartments as $apartment) {
            $coordinates[] = array(
                'latitude' => $apartment->latitude,
                'longitude' => $apartment->longitude,
            );
            $id_apartments[] = $apartment->id;
        }

        $apartment_sponsorship = DB::table('apartment_sponsorship')
            ->select('apartment_id')
            ->where('end_date', '>=', date('Y-m-d'))
            ->get();

        $apartments_id_sponsorship = $apartment_sponsorship->pluck('apartment_id');

        $apartments_id_sponsorship = $apartments_id_sponsorship->intersect($id_apartments);
        $apartments_sponsorship = Apartment::whereIn('id', $apartments_id_sponsorship)->get();

        $services = Service::all();

        return view('guest.home.search', compact('apartments', 'coordinates', 'id_apartments', 'services', 'apartments_sponsorship'));
    }

    public function search(Request $request)
    {
        $id_apartments = $request->id_apartments;
        $id_services = $request->services;

        $results = DB::table('apartment_service')
            ->select('apartment_id', 'service_id')
            ->whereIn('apartment_id', $id_apartments)
            ->whereIn('service_id', $id_services)
            ->get();

        $coordinates = array();
        $id_apartments = array();

        foreach ($results as $apartment) {
            $id_apartments[] = $apartment->apartment_id;
            $apartment = Apartment::find($apartment->apartment_id);
            $coordinates[] = array(
                'latitude' => $apartment["latitude"],
                'longitude' => $apartment["longitude"],
            );
        }

        $apartments = Apartment::whereIn('id', $id_apartments)->get();
        $services = Service::all();

        return view('guest.home.search', compact('apartments', 'coordinates', 'id_apartments', 'services'));

    }

}
