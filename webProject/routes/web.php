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
Route::group(['prefix'=>'/offers'],function(){
    Route::get('setoffer', [App\Http\Controllers\crudController::class, 'setoffer'])->name('offers.setoffer');
    Route::get('getoffer', [App\Http\Controllers\crudController::class, 'getOffers'])->name('offers.getoffer');
    Route::post('deleteoffer', [App\Http\Controllers\crudController::class, 'deleteOffer'])->name('offers.deleteoffer');
});
Route::group(['prefix'=>'/adminslog','middleware'=>'auth:admin','namespace'=>'dashboard'],function(){
    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class])->name('admins.dashboard');
});



Route::group(['prefix'=>'/admins','middleware'=>'guest:admin'],function (){
    Route::get('login', [App\Http\Controllers\Dashboard\HomeController::class, 'loginView'])->name('admins.loginview');
    Route::post('login', [App\Http\Controllers\Dashboard\HomeController::class,''])->name('admin.login');
});
