<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                //VANNO PASSATE LE CHIAVI DI BRAINTREE
                [
                    'environment' =>'sandbox',
                    'merchantID' => '2jc48gsfxz4y6qx7',
                    'publicJey'=>'cxhtt69spcmvjv86',
                    'privateKey'=>'4cbee2067a5487904fdb2452aa9542e8'
                ]
            );
        });
    }
}
