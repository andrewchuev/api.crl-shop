<?php

namespace Tests\Feature;

use App\Models\User;
use App\Modules\Products\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_add_product_to_cart()
    {
        // Создаем пользователя
        $user = User::factory()->create();

        // Авторизуем пользователя
        $this->actingAs($user, 'sanctum');

        // Создаем продукт
        $product = Product::factory()->create();

        // Выполняем POST-запрос для добавления товара в корзину
        $response = $this->postJson('/cart/add', [
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        // Проверяем успешный ответ
        $response->assertStatus(201);
        $response->assertJson(['message' => 'Product added to cart']);

        // Проверяем, что товар был добавлен в корзину
        $this->assertDatabaseHas('carts', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
    }
}

