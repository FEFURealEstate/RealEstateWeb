<?php

use App\Http\Controllers\admin\RealtorsController;
use App\Http\Controllers\admin;
use App\Http\Controllers\AllReqController;
use App\Http\Controllers\AllSellsController;
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
    Route::post('/admin/clients', [admin\ClientsController::class, 'add'])->name('admin_clients_add');
    Route::get('/admin/clients', [admin\ClientsController::class, 'get'])->name('admin_clients_get');
    Route::match(['get', 'post'], '/admin/clients/change/{id}', [admin\ClientsController::class, 'change'])->name('admin_clients_change');
    Route::get('/admin/clients/delete/{id}', [admin\ClientsController::class, 'delete'])->name('admin_clients_delete');
    Route::get('/admin/client/{id}', [admin\ClientsController::class, 'view'])->name('admin_client_view');

    Route::post('/admin/realtors', [admin\RealtorsController::class, 'add'])->name('admin_realtors_add');
    Route::get('/admin/realtors', [admin\RealtorsController::class, 'get'])->name('admin_realtors_get');
    Route::match(['get', 'post'], '/admin/realtors/change/{id}', [admin\RealtorsController::class, 'change'])->name('admin_realtors_change');
    Route::get('/admin/realtors/delete/{id}', [admin\RealtorsController::class, 'delete'])->name('admin_realtors_delete');
    Route::get('/admin/realtor/{id}', [admin\RealtorsController::class, 'view'])->name('admin_realtor_view');

    Route::post('/admin/objects', [admin\ObjectsController::class, 'add'])->name('admin_objects_add');
    Route::get('/admin/objects', [admin\ObjectsController::class, 'get'])->name('admin_objects_get');
    Route::match(['get', 'post'], '/admin/objects/change/{id}', [admin\ObjectsController::class, 'change'])->name('admin_objects_change');
    Route::get('/admin/objects/delete/{id}', [admin\ObjectsController::class, 'delete'])->name('admin_objects_delete');

    Route::get('/admin/deals',admin\DealsController::class)->name('admin_deals');

    Route::get('/admin/needs', [admin\NeedsController::class, 'view'])->name('admin_needs');
    Route::get('/admin/needs/{req_id}', [admin\NeedsController::class, 'cur_view'])->name('admin_needs_view');
    Route::post('/admin/needs/{req_id}', [admin\NeedsController::class, 'realtor_select'])->name('realtor_select');

    Route::get('/admin/offers', [admin\OffersController::class, 'view'])->name('admin_offers');
    Route::get('/admin/offers/{sell_id}', [admin\OffersController::class, 'cur_view'])->name('admin_offers_view');
    Route::post('/admin/offers/{sell_id}', [admin\OffersController::class, 'realtor_select'])->name('realtor_select_off');

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

Route::middleware('is_realtor')->group(function(){
    Route::match(['get', 'post'], '/all_req', [AllReqController::class, 'all_req'])->name('all_req');
    Route::get('/all_req/{req_id}', [AllReqController::class, 'cur_req'])->name('cur_req');
    Route::post('/all_req/{req_id}', [AllReqController::class, 'offer_estate'])->name('offer_estate');

    Route::match(['get', 'post'], '/all_sells', [AllSellsController::class, 'all_sells'])->name('all_sells');
    Route::get('/all_sells/{sell_id}', [AllSellsController::class, 'cur_sell'])->name('cur_sell');
    Route::post('/all_sells/{sell_id}', [AllSellsController::class, 'offer_estate_sell'])->name('offer_estate_sell');
});
