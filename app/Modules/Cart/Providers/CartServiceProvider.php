<?php

namespace App\Modules\Cart\Providers;

use App\Modules\Cart\Repositories\CartRepository;
use App\Modules\Cart\Services\CartService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Регистрация сервисов или репозиториев корзины
        $this->app->bind('CartService', function ($app) {
            return new CartService(
                new CartRepository
            );
        });

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return "App\\Modules\\Cart\\database\\factories\\CartFactory";
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
