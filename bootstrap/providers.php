<?php

use App\Modules\Cart\Providers\CartServiceProvider;
use App\Modules\Orders\Providers\OrderServiceProvider;
use App\Modules\Products\Providers\ProductServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    CartServiceProvider::class,
    OrderServiceProvider::class,
    ProductServiceProvider::class,
];
