<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsorship;
use App\Apartment;
use Braintree_Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{


    public function process(Request $request, $id, $promo_id) {
        //$data = $request->all();
        //dd($id, $promo_id);
        //dd($promo->price);

        /* recupero la casa */
        $apartment = Apartment::find($id);
        /* recupero la promo */
        $sponsorship = Sponsorship::find($promo_id);

        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];

        $status = Braintree_Transaction::sale([

            'amount' => $sponsorship->price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]

        ]);

        /* sincronizzo la relazione */
        $apartment->sponsorships()->sync($sponsorship);

        /*aggiorno il created_at ad ogni promo*/
        $update = DB::table('apartment_sponsorship')
            ->where('apartment_sponsorship.apartment_id', '=', $id)
            ->update(['apartment_sponsorship.created_at' => Carbon::now()->toDateTimeString()]);

        /*salvo la relazione*/
        $apartment->save();


        return view('admin.pagamenti.index', compact('apartment', 'sponsorship'));
        response()->json($status);

    }

}
