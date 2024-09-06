<?php

namespace App\Providers;

use App\Modules\Cart\Repositories\CartRepository;
use App\Modules\Cart\Services\CartService;
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
    }

    public function boot()
    {
        // Подключение маршрутов для корзины
        $this->loadRoutesFrom(__DIR__.'/../Modules/Cart/routes/api.php');

        // Подключение миграций для корзины
        $this->loadMigrationsFrom(__DIR__.'/../Modules/Cart/migrations');
    }
}
