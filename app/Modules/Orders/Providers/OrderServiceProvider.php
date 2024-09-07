<?php

namespace App\Modules\Orders\Providers;

use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Регистрация сервисов или репозиториев для заказов (если нужно)
        /*$this->app->bind('OrderService', function ($app) {
            return new App\Modules\Orders\Services\OrderService(
                new OrderRepository()
            );
        });*/
    }

    public function boot()
    {
        // Подключение маршрутов для заказов
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Подключение миграций для заказов
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
