<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\Sponsorship;
use App\Service;

use Illuminate\Support\Str;



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
        $apartments = Apartment::where('user_id', auth()->user()->id)->get();
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
        $apartment = new Apartment();
        $apartment->fill($form_data);
        $apartment->latitude = 45.4654219;
        $apartment->longitude = 9.1859243;
        $apartment->user_id = Auth::id();

        $apartment->save();

        $slug = Str::slug($apartment['title'], '-');
        // VERIFICO SE LO SLUG SIA UNICO NEL SUO GENERE POICHE NEL DATABASE L HO IMPOSTATO COME UNICO
        $slug_presente = Apartment::where('slug', $slug)->first();
        // ISTANZIO UN CONTATORE NUMERICO CHE VERRÁ AGGIUNTO AL MIO SLUG BASE CON UN CICLO WHILE ANDANDO AD INCREMENTARE IL VALORE QUAL ORA ESSO SIA GIA PRESENTE
        $contatore = 1;
        while ($slug_presente) {
            $slug = $slug . '-' . $contatore;
            //VERIFICO SE NON HO UN Apartment CON LO STESSO SLUG ANCHE ALL INTERNO
            $slug_presente = Apartment::where('slug', $slug)->first();
            $contatore++;
        }

        $apartment->slug = $slug;
        $apartment->save();

        // PASSO AL NEW POST LE INFORMAZIONI DEI TAG INSERITI
        $apartment->services()->attach($form_data['services']);

        return redirect()->route('admin.apartments.index')->with('success', 'Appartamento aggiunto correttamente');
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
        $request->validate([

            'title' => 'required | max: 255',
            'beds' => 'required',
            'rooms' => 'required',
            'bathrooms' => 'required'

        ]);


        /* $apartment->save(); */
        $form_data = $request->all();

        $apartment->update($form_data);

        if ($form_data['title'] != $apartment['title']) {
            // E' STATO MODIFICATO IL TITOLO QUINDI DEVO MODIFICARE LO SLUG
            $slug = Str::slug($form_data['title'], '-');

            $slug_presente = Apartment::where('slug', $slug)->first();

            $contatore = 1;
            while ($slug_presente) {
                $slug = $slug . '-' . $contatore;

                $slug_presente = Apartment::where('slug', $slug)->first();
                $contatore++;
            };

            $form_data['slug'] = $slug;
        }
        // QUI SE USO L-ATTACH CREA PROBLEMI, IN QUESTO CASO IL METODO SYNC E' MEGLIO, SYNC SI PREOCCUPA DI RIMUOVERE E AGGIUNGERE LE MODIFICHE, NELL UPDATE E' OBBLIGATORIO IL SYNC
        $apartment->update($form_data);
        // UTILIZZO UN METODO PER VERIFICARE SE LA CHIAVE service ESISTE IN FORM DATA PER PREVENIRE UN ERRORE
        if(array_key_exists('service', $form_data)) {
            $apartment->service()->sync($form_data['service']);
        }
        else {
            // QUESTO NEL CASO IN CUI DESELEZIONO TUTTO, PASSO UN ARRAY VUOTO ALTRIMENTI LUI SOPRA NON FARA NULLA.
            $apartment->service()->sync([]);
        }
        return redirect()->route('admin.apartaments.index')->with('status', 'Appartamento correttamente aggiornato');


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
        $apartment->service()->detach();
        $apartment->delete();
        return redirect()->route('admin.apartments.index');
    }

    /* public function createSponsorship()
    {
        $sponsorType= Sponsorship::all();
        return view('admin.apartments.sponsorship.create', compact('sponsorType'));
    } */

   /*  public function storeSponsorship(Request $request, $id){
        $newApartamentSponsored = DB('')


    } */
}
