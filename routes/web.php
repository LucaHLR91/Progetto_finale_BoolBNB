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

Route::get('/search', 'QueryController@searchController')->name('search');
// Route::post('/service', 'QueryController@queryService')->name('searchQuery');


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

    // ROTTA PAGAMENTI
    Route::get('/payments', 'SponsoController@payments')->name('payments');
  

    // ROTTA PER INVIARE IL PAGAMENTO SU BRAINTREE 
    Route::post('/checkout', 'SponsoController@checkout' )->name('checkout');

    
});

