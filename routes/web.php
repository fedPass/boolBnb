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

Route::get('/', function () {
    return view('public-home');
})->name('public-home');


// pagina termini e privacy - public
Route::get('/terms', function () {
    return view('termini-privacy',
    ['datas'=>config('termini-privacy')]);
    })->name('termini-privacy');

Route::get('/room', function () {
    return view('room-details');
});

Auth::routes();

//home admin
Route::get('/admin', 'admin\HomeController@index')->name('admin-home');
//index admin
Route::get('/admin/index', 'admin\ApartmentController@index')->name('admin-index');
//pagina di create
Route::get('/admin/create', 'admin\ApartmentController@create')->name('admin-create');

// //pagine visibile per utente registrato
// Route::middleware('auth')->namespace('admin')->prefix('admin')->name('admin.')->group(function(){
//     Route::get('/', 'HomeController@index')->name('index');
//     Route::resource('/apartaments', 'ApartmentController');
// });
