<?php

use Illuminate\Support\Facades\Route;

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

// Home page
Route::get('/', 'HomeController@index')->name('public-home');

// pagina termini e privacy - public
Route::get('/terms', function () {
    return view('termini-privacy',
    ['datas'=>config('termini-privacy')]);
    })->name('termini-privacy');

//pagina dettaglio stanza
Route::get('/room', function () {
    return view('room-details');
});

//public apartment
Route::get('/apartments', 'ApartmentController@index');
Route::get('/apartments/{id}', 'ApartmentController@show')->name('apartshow');

Route::post('/apartments/{id}', 'LeadController@store')->name('email');

Auth::routes();

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/')->with('error', 'You were logged out successfully!');
});


//pagine visibile per utente registrato
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/apartments', 'ApartmentController');
    Route::resource('/leads', 'LeadController');
});
