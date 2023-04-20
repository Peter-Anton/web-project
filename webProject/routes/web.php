<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\NewsLatterController;
use App\Http\Controllers\OfferComment;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Registercontroller;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CrudController::class, 'getGridView'])->name('home');
Route::get('company/{company:name}', [CrudController::class, 'getCompany'])->name('get-company');
Route::get('category/{category:slug}', [CrudController::class, 'getCategory'])->name('get-category');
Route::get('brief/{brief:slug}', [CrudController::class, 'getBrief'])->name('get-brief');
Route::post('brief/{brief:slug}/comment', [OfferComment::class, 'store'])->name('comment.store');


Route::get('register', [Registercontroller::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [Registercontroller::class, 'store'])->name('stores')->middleware('guest');
Route::post('logout', [SessionController::class, "destroy"])->name('logout')->middleware('auth');
Route::get('login', [SessionController::class, "login"])->name('login')->middleware('guest');
Route::post('login', [SessionController::class, "store_login"])->name('login')->middleware('guest');

Route::post('newsletter',NewsLatterController::class)->name('newsletter');

Route::group(['prefix' => '/client'], function () {
    Route::get('all', [OfferController::class, 'getAlloffers'])->name('offers.all');
    Route::post('delete', [OfferController::class, 'delete'])->name('offers.delete');
});

Route::group(['prefix' => '/admin','middleware' => 'admin'], function () {
    Route::get('create', [OfferController::class, 'create'])->name('offers.create');
    Route::post('store', [OfferController::class, 'store'])->name('offers.store');
    Route::get('edit/{offer_id}', [OfferController::class, 'edit'])->name('offers.edit');
    });


