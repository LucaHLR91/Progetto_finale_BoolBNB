<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

// ROTTE CHE GESTISCONO IL MECCANISMO DI AUTENTICAZIONE
Auth::routes();

// ROTTE PER LA GESTIONE DEL BACKOFFICE
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')
->group(function() {
    // PAGINA DI ATTERRAGGIO DOPO IL LOG IN (PREFISSO SARÁ /ADMIN)
    Route::get('/', 'HomeController@index')->name('index');
    // ROTTA CHE RICHIAMA GLI APPARTAMENTI
    Route::resource('/apartments', 'ApartmentController');
    // ROTTA PER LE SPONSORIZZAZIONI
    Route::resource('/sponsorships', 'SponsorshipController');
});

