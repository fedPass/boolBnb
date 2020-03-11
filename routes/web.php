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
});

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
Route::get('/admin', function () {
    return view('admin.home');
});
