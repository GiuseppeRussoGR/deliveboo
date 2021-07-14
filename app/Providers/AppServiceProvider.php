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
        $this->app->singleton(Gateway::class, function () {
            return new Gateway(
                [
                    'environment' => config('braintree.environment'),
                    'merchantId' => config('braintree.merchantId'),
                    'publicKey' => config('braintree.publicKey'),
                    'privateKey' => config('braintree.privateKey')
                ]
            );
        });
    }
}
