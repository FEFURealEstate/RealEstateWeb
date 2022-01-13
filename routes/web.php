<?php

use App\Http\Controllers\admin\RealtorsController;
use App\Http\Controllers\admin;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;

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
})->name('welcome')->middleware('is_user');

Route::match(['get', 'post'], '/sign_up', SignUpController::class)->name('sign_up');

Route::match(['get', 'post'], '/sign_in', SignInController::class)->name('sign_in');

Route::middleware('auth')->group(function(){
    Route::get('/logout', LogOutController::class)->name('logout');
    Route::get('/profile', ProfileController::class)->name('profile');
});


Route::middleware('is_admin')->group(function () {
    Route::post('/admin/clients', [admin\ClientsController::class, 'add'])->name('admin_clients_add');
    Route::get('/admin/clients', [admin\ClientsController::class, 'get'])->name('admin_clients_get');
    Route::match(['get', 'post'], '/admin/clients/change/{id}', [admin\ClientsController::class, 'change'])->name('admin_clients_change');
    Route::get('/admin/clients/delete/{id}', [admin\ClientsController::class, 'delete'])->name('admin_clients_delete');
    Route::get('/admin/client/{id}', [admin\ClientsController::class, 'view'])->name('admin_client_view');

    Route::get('/admin/deals',admin\DealsController::class)->name('admin_deals');

    Route::get('/admin/needs', admin\NeedsController::class)->name('admin_needs');

    Route::match(['get', 'post'],'/admin/objects', admin\ObjectsController::class)->name('admin_objects');
    Route::match(['get', 'post'], '/admin/objects/change', admin\ObjectChangeController::class)->name('admin_objects_change');


    Route::get('/admin/offers', admin\OffersController::class)->name('admin_offers');

    Route::match(['get', 'post'], '/admin/realtors', admin\RealtorsController::class)->name('admin_realtors');
    Route::match(['get', 'post'], '/admin/realtors/change', admin\RealtorChangeController::class)->name('admin_realtors_change');
});
