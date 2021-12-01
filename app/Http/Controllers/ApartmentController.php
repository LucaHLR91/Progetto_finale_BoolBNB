<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $apartments = Apartment::all();
        // return view('guest.home.search', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        
      

        return view('guest.home.search', compact('apartments'));
    }
            
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // la seguente funzione recupera N°stanze e N°letti
    public function search(Request $request) {
        // $beds = $request->beds;
        // $rooms = $request->rooms;
        // $city = $request->city;

        // $results = Apartment::where('beds', '=', $beds)->where('rooms', '=', $rooms)->where('city', '=', $city)->get();

        // dd($results);
    }
}
