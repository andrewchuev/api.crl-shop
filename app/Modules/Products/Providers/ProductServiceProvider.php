<?php

namespace App\Modules\Products\Providers;

use App\Modules\Products\Repositories\ProductRepository;
use App\Modules\Products\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ProductService', function ($app) {
            return new ProductService(
                new ProductRepository
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }
}
