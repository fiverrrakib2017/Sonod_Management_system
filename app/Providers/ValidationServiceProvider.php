<?php

namespace App\Providers;

use App\Services\ValidationService;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ValidationService::class, function ($app) {
            return new ValidationService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->app->bind('App\Services\ValidationService', function ($app) {
        //     return new ValidationService();
        // });
    }
}
