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
        // PRENDO L'ID DELL'APPARTAMENTO
        $id = $request->id;
        // PRENDO TUTTI I TIPI DI SPONSORIZZAZIONI
        $sponsorships = Sponsorship::all();

        $apartment = Apartment::findOrFail($id);
        // PRENDO TUTTI I DATI DELLA TABELLA PONTE E LI PASSO ALLA VISTA DELLE SPONSORIZZAZIONI
       
        return view('admin.sponsorships.index', compact('sponsorships', 'id', 'apartment'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create($id)
    {
        $sponsorships = Sponsorship::all();
        
        $apartment = Apartment::findOrFail($id);
        $date = Carbon::now()->addDays(3);
        $apartment_sponsorship = DB::table('apartment_sponsorship')
                                ->where('apartment_id', $id)
                                ->where('end_date', '>', $date)
        ->get();

        if(count($apartment_sponsorship) > 0){
            return redirect()->route('admin.sponsorships.index', $id)->with('error', 'Questo appartamento è già sponsorizzato');
        }
        else{
            return view('admin.sponsorships.create', compact('sponsorships', 'id', 'apartment'));
        }
        

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

    public function payment(Request $request)
    {
        $token = $this->generateToken();
        $sponsorship_data = $request->all();
        return view('admin.payments.index', ['token' => $token], compact('sponsorship_data'));

    }

    public function checkout(Request $request){
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => 'Tony',
                'lastName' => 'Stark',
                'email' => 'tony@avengers.com',
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            

            $apartment_id = $request->apartment_id;
            $sponsorship_id = $request->sponsorship_id;
            $current_sponsorship = Sponsorship::where('id', $sponsorship_id)->get();

            $days_to_add = $current_sponsorship[0]['duration'] / 24;   
            
            $newStartDateTime = Carbon::now();
            $newEndDatetime = Carbon::now()->addDays($days_to_add);

            $new_apartment_sponsorship = Db::table('apartment_sponsorship')->insert(
                [
                    'apartment_id' => $apartment_id,
                    'sponsorship_id' => $sponsorship_id,
                    'start_date' => $newStartDateTime,
                    'end_date' => $newEndDatetime
                ]
            );


            return redirect()->route('admin.apartments.index')->with('success_message', 'Transaction successful. The ID is:'. $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }

        
    }
}