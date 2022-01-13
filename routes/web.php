<?php

use App\Http\Controllers\admin\RealtorsController;
use App\Http\Controllers\admin;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\client;

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
})->name('welcome');

Route::match(['get', 'post'], '/sign_up', SignUpController::class)->name('sign_up');

Route::match(['get', 'post'], '/sign_in', SignInController::class)->name('sign_in');

Route::middleware('auth')->group(function(){
    Route::get('/logout', LogOutController::class)->name('logout');
    Route::get('/profile', ProfileController::class)->name('profile');
});


Route::middleware('is_admin')->group(function () {
    Route::match(['get', 'post'], '/admin/clients', admin\ClientsController::class)->name('admin_clients');
    Route::match(['get', 'post'], '/admin/clients/change', admin\ClientChangeController::class)->name('admin_clients_change');

    Route::get('/admin/deals',admin\DealsController::class)->name('admin_deals');

    Route::get('/admin/needs', admin\NeedsController::class)->name('admin_needs');

    Route::match(['get', 'post'],'/admin/objects', admin\ObjectsController::class)->name('admin_objects');
    Route::match(['get', 'post'], '/admin/objects/change', admin\ObjectChangeController::class)->name('admin_objects_change');


    Route::get('/admin/offers', admin\OffersController::class)->name('admin_offers');

    Route::match(['get', 'post'], '/admin/realtors', admin\RealtorsController::class)->name('admin_realtors');
    Route::match(['get', 'post'], '/admin/realtors/change', admin\RealtorChangeController::class)->name('admin_realtors_change');
});

Route::middleware('is_user')->group(function(){
    Route::match(['get', 'post'], '/create_requirement', client\CreateRequirementController::class)->name('create_req');

    Route::get('/my_requirements', [client\MyRequirementsController::class, 'get_requirements'])->name('my_req');
    Route::get('/my_requirements/{req_id}', [client\MyRequirementsController::class, 'get_req_info'])->name('my_req_info')->middleware('demand_owns');
    Route::delete('/my_requirements/{req_id}', [client\MyRequirementsController::class, 'delete_req'])->name('delete_req')->middleware('demand_owns');
    Route::post('/my_requirements/{req_id}', [client\MyRequirementsController::class, 'buy_estate'])->name('buy_estate')->middleware('demand_owns');

    Route::match(['get', 'post'], '/create_sell', client\SellEstateController::class)->name('create_sell');

    Route::get('/my_sells', [client\MySellController::class, 'get_sell'])->name('my_sell');
    Route::get('/my_sell/{sell_id}', [client\MySellController::class, 'get_sell_info'])->name('my_sell_info')->middleware('supply_owns');
    Route::delete('/my_sell/{sell_id}', [client\MySellController::class, 'delete_sell'])->name('delete_sell')->middleware('supply_owns');
    Route::post('/my_sell/{sell_id}', [client\MySellController::class, 'sell_estate'])->name('sell_estate')->middleware('supply_owns');

});