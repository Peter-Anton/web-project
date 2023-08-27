<?php

namespace App\Providers;

use App\Api_Service\NewsLatter;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use App\Api_Service\MailchimpNewsLatters;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // if u want to add some dependencies that the class need to work
        /* example:
         * app()->bind('path.to.class', function () {});
         * this function makes you play in the constructor of this function
         * */
        app()->bind(NewsLatter::class,function () {
            $client=new ApiClient();
            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us17'
            ]);
            return new MailchimpNewsLatters($client);
        });
    }

    public function boot()
    {
        Schema::defaultStringLength(191);
//        Paginator::useTailwind();  //you can change the style of pagination use this methode
        Model::unguard();
        Gate::define('systemUsr',function ($user){
            return $user->name=='peter anton';
        });
        Gate::define('admin',function ($admin){

        });
        Blade::if('systemUsr',function (){
            return request()->user()?->can('SystemUsr');
        });
    }
}
