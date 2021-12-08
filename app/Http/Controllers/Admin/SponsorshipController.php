<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        // TODO
        $sponsorships = Sponsorship::all();
        return view('admin.sponsorships.index', compact('sponsorships', 'id'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sponsorships = Sponsorship::all();
        $apartment = Apartment::findOrFail('id');
        // controllare questa rotta
        return view('admin.sponsorships.create', compact('sponsorships', 'apartment'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sponsorship_data = $request->all();
        // $apartment_id = $request->apartment_id;
        // $sponsorship_id = $request->sponsorship_id;
        // $current_sponsorship = Sponsorship::where('id', $sponsorship_id)->get();

        // $days_to_add = $current_sponsorship[0]['duration'] / 24;   
        
        // $newStartDateTime = Carbon::now();
        // $newEndDatetime = Carbon::now()->addDays($days_to_add);

        // $new_apartment_sponsorship = Db::table('apartment_sponsorship')->insert(
        //     [
        //         'apartment_id' => $apartment_id,
        //         'sponsorship_id' => $sponsorship_id,
        //         'start_date' => $newStartDateTime,
        //         'end_date' => $newEndDatetime
        //     ]
        // );

        // return view('admin.payments.index', compact('sponsorship_data'));
        return redirect()->route('admin.payments', compact('sponsorship_data'));
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

    /**
     *
     * Generate token BrainTree
     *
     *
    */
    public function generateToken()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return $clientToken;

    }
}
