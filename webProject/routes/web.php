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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//  Route::post('adminLogin',[App\Http\Controllers\AdminController::class,'getAdminLogin'])->name('admin.login');

Route::group(['prefix'=>'/client'],function(){
    Route::get('all', [App\Http\Controllers\OfferController::class, 'getAlloffers'])->name('offers.all');
    Route::post('delete',[App\Http\Controllers\OfferController::class, 'delete'])->name('offers.delete');
});


Route::group(['prefix'=>'/admin'],function(){
        Route::get('create', [App\Http\Controllers\OfferController::class, 'create'])->name('offers.create');
        Route::post('store', [App\Http\Controllers\OfferController::class, 'store'])->name('offers.store');
        Route::get('edit/{offer_id}',[App\Http\Controllers\OfferController::class, 'edit'])->name('offers.edit');

    });
