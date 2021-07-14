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
        /**
         * Eseguo applicazione in singleton per avere una ed una sola istanza per volta
         * della classe Braintree
         */
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '6p8mw3xphybtnx2f',
                    'publicKey' => 'r555cgsj76v73wp8',
                    'privateKey' => 'e9e23aabf186e6ae9ec43f3092808dc0'
                ]
            );
        });
    }
}
