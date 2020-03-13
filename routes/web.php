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

Route::get('/room', function () {
    return view('room-details');
});

//public apartment
Route::get('/apartments', 'ApartmentController@index')->name('apartlist');
Route::get('/apartments/{id}', 'ApartmentController@show')->name('apartshow');


Route::post('/apartments/{id}', 'LeadController@store')->name('email');

Auth::routes();

//pagine visibile per utente registrato
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/apartments', 'ApartmentController');
    Route::resource('/leads', 'LeadController');
});
