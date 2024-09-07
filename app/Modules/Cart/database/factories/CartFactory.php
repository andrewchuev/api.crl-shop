<?php

namespace App\Modules\Cart\database\factories;

use App\Models\User;
use App\Modules\Cart\Models\Cart;
use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Создаем пользователя
            'product_id' => Product::factory(), // Создаем продукт
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
