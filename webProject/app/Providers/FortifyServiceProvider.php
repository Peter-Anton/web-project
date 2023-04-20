<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application Api_Service.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application Api_Service.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

//        RateLimiter::for('login', function (Request $request) {
//            $email = (string) $request->email;
//
//            return Limit::perMinute(5)->by($email.$request->ip());
//        });
//
//        RateLimiter::for('two-factor', function (Request $request) {
//            return Limit::perMinute(5)->by($request->session()->get('login.id'));
//        });

        Fortify::loginView(function (){
            return view('auth.login');
        });
        Fortify::registerView(function (){

            return view('auth.register');
        });
        Fortify::verifyEmailView(function (){
            return view('auth.verify');

        });
    }
}
