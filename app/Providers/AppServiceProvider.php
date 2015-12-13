<?php

namespace App\Providers;

use App\Providers\Rest\RestClient;
use App\Providers\Rest\RestService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rest', RestService::class);

        $this->app->singleton('rest.client', RestClient::class);
    }
}
