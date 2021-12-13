<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SponsorshipController;

use  Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Sponsorship;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');

// Rotta ricerca

Route::get('/search', 'QueryController@index')->name('search');
Route::get('/advancesearch', 'QueryController@search')->name('searchQuery');

Route::resource('/sendMessage', 'MessageController');
Route::resource('/messages', 'ApartmentController');



// ROTTE CHE GESTISCONO IL MECCANISMO DI AUTENTICAZIONE
Auth::routes();

// ROTTE PER LA GESTIONE DEL BACKOFFICE
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
->group(function() {
    // PAGINA DI ATTERRAGGIO DOPO IL LOG IN (PREFISSO SARÁ /ADMIN)
    Route::get('/', 'HomeController@index')->name('dashboard_home');
    // ROTTA PER IL LOGOUT
    Route::post('/logout', 'HomeController@logout')->name('logout');
    // ROTTA CHE RICHIAMA GLI APPARTAMENTI
    Route::resource('/apartments', 'ApartmentController');
    // ROTTA PER LE SPONSORIZZAZIONI
    Route::resource('/sponsorships', 'SponsorshipController');
    
    // ROTTA PER I MESSAGGI
    Route::resource('/messages', 'MessageController');


Route::get('/payments', function (Request $request) {
    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'jhyydtvdfmj4v7pg',
        'publicKey' => '3jz5xvzgc62stk59',
        'privateKey' => '8eec4652dc361871beaf5f71c1ecf7f0'
    ]);
    $request_data = $request->all();
    $sponsorship_data = $request_data['sponsorship_data'];

    $token = $gateway->ClientToken()->generate();

    return view('admin.payments.index', ['token' => $token], compact('sponsorship_data'));

})->name('payments');

Route::post('/checkout', function (Request $request) {

    $gateway = new Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'jhyydtvdfmj4v7pg',
        'publicKey' => '3jz5xvzgc62stk59',
        'privateKey' => '8eec4652dc361871beaf5f71c1ecf7f0'
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
})->name('checkout');



    
});

