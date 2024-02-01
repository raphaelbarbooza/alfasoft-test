<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Set faker as PT
        $this->app->singleton(Generator::class, function(){
            return Factory::create('pt');
        });
        // Using Bootstrap paginators
        Paginator::useBootstrapFive();
        // Force HTTPS on Production
        URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
