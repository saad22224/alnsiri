<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Moyasar\Providers\PaymentService;


class PaymentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(PaymentService::class, function ($app) {
            return new PaymentService();
        });
    }
}

