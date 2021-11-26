<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Service;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
 
            'title' => 'required | max: 255',
            'beds' => 'required',
            'rooms' => 'required',
            'bathrooms' => 'required',
            'square_meters' => 'required',
            'image' => 'required',
            'address' => 'required',
            'city' => 'required',
 
        ]);
        
        $form_data = $request->all();
        $new_apartment = new Apartment();
        $new_apartment->fill($form_data);
        $new_apartment->latitude = 45.4654219;
        $new_apartment->longitude = 9.1859243;
        $new_apartment->user_id = Auth::id();
        
        $slug = Str::slug($new_apartment->title,'-');
        $slug_base = $slug;

        $slug_presente = Apartment::where('slug', $slug)->first();

        $contatore=1;

        while($slug_presente) {
            $slug = $slug_base . '-' . $contatore;
            $slug_presente = Apartment::where('slug', $slug)->first();
            $contatore++;
        }

        $new_apartment->slug = $slug;


        $new_apartment->save();
        return redirect()->route('admin.apartments.index')->with('status', 'Appartamento inserito correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        $services = Service::all();
        return view('admin.apartments.edit', compact('apartment', 'services'));
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
        $apartment = Apartment::findOrFail($id);
        $data = $request->validate([
 
            'title' => 'required | max: 255',
            'beds' => 'required',
            'rooms' => 'required',
            'bathrooms' => 'required'
 
        ]);
 
        $apartment->fill($data);
        $apartment->save();
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        $apartment->delete();
        return redirect()->route('admin.apartments.index');
    }
}
