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
    return view('welcome');
});

Route::get('/sign_up', function () {
    return view('sign_up_view');
});

Route::get('/sign_in', function () {
   return view('sign_in_view');
});

Route::middleware('is_admin')->group(function () {
    Route::get('/clients', function () {
        return view('admin_views/clients_view');
    });

    Route::get('/deals', function () {
        return view('admin_views/deals_view');
    });

    Route::get('/needs', function () {
        return view('admin_views/needs_view');
    });

    Route::get('/objects', function () {
        return view('admin_views/objects_view');
    });

    Route::get('/offers', function () {
        return view('admin_views/offers_view');
    });

    Route::get('/realtors', function () {
        return view('admin_views/realtors_view');
    });
});
