<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\OfferComment;
use App\Http\Controllers\Registercontroller;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use MailchimpMarketing\ApiClient;

Route::get('/', [CrudController::class,'getGridView'])->name('home');
Route::get('company/{company:name}',[CrudController::class,'getCompany'])->name('get-company');
Route::get('category/{category:slug}',[CrudController::class,'getCategory'])->name('get-category');
Route::get('brief/{brief:slug}',[CrudController::class,'getBrief'])->name('get-brief');
Route::post('brief/{brief:slug}/comment',[OfferComment::class,'store'])->name('comment.store');


Route::get('register',[Registercontroller::class,'create'])->name('register')->middleware('guest');
Route::post('register',[Registercontroller::class,'store'])->name('store')->middleware('guest');
Route::post('logout',[SessionController::class,"destroy"])->name('logout')->middleware('auth');
Route::get('login',[SessionController::class,"login"])->name('login')->middleware('guest');
Route::post('login',[SessionController::class,"store_login"])->name('login')->middleware('guest');

Route::post('newsletter',function(){
    request()->validate([
        'email'=>'required|email'

    ]);
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us17'
    ]);

    $response = $mailchimp->lists->addListMember("4eb883d081",[
        'email_address'=>request('email'),
        'status'=>'subscribed'
    ]);
    return redirect('/')->with('success','you are subscribed successfully');
})->name('newsletter');

Route::group(['prefix'=>'/client'],function(){
    Route::get('all', [App\Http\Controllers\OfferController::class, 'getAlloffers'])->name('offers.all');
    Route::post('delete',[App\Http\Controllers\OfferController::class, 'delete'])->name('offers.delete');
});

Route::group(['prefix'=>'/admin'],function(){
        Route::get('create', [App\Http\Controllers\OfferController::class, 'create'])->name('offers.create');
        Route::post('store', [App\Http\Controllers\OfferController::class, 'store'])->name('offers.store');
        Route::get('edit/{offer_id}',[App\Http\Controllers\OfferController::class, 'edit'])->name('offers.edit');

    });
