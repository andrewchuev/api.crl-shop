<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ProductService', function ($app) {
            return new \App\Modules\Products\Services\ProductService(
                new \App\Modules\Products\Repositories\ProductRepository()
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Modules/Products/routes/api.php');
    }
}
