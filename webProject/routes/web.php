<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\Registercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [CrudController::class,'getGridView'])->name('home');
Route::get('company/{company:name}',[CrudController::class,'getCompany'])->name('get-company');
Route::get('category/{category:slug}',[CrudController::class,'getCategory'])->name('get-category');




Route::get('register',[Registercontroller::class,'create'])->name('register');
Route::post('store',[Registercontroller::class,'store'])->name('store');

Route::group(['prefix'=>'/client'],function(){
    Route::get('all', [App\Http\Controllers\OfferController::class, 'getAlloffers'])->name('offers.all');
    Route::post('delete',[App\Http\Controllers\OfferController::class, 'delete'])->name('offers.delete');
});


Route::group(['prefix'=>'/admin'],function(){
        Route::get('create', [App\Http\Controllers\OfferController::class, 'create'])->name('offers.create');
        Route::post('store', [App\Http\Controllers\OfferController::class, 'store'])->name('offers.store');
        Route::get('edit/{offer_id}',[App\Http\Controllers\OfferController::class, 'edit'])->name('offers.edit');

    });
