<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\DestinasiServiceInterface;
use App\Services\ApiService;
use App\Services\DestinasiService;
use App\Contracts\HttpClientInterface;
use App\Services\HttpClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding ApiService ke service container
        // $this->app->singleton(ApiService::class, function ($app) {
        //     return new ApiService();
        // });

        $this->app->bind(HttpClientInterface::class, HttpClient::class);


        $this->app->singleton(ApiService::class, function ($app) {
            return new ApiService($app->make(HttpClientInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
