<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Modules\Products\Models\Product;
use App\Modules\Cart\Models\Cart;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_order()
    {
        // Создаем пользователя и продукт
        $user = User::factory()->create();
        $product = Product::factory()->create();

        // Авторизуем пользователя
        $this->actingAs($user, 'sanctum');

        // Добавляем товар в корзину
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        // Выполняем POST-запрос для оформления заказа
        $response = $this->postJson('/api/checkout', [
            'payment_method' => 'credit_card',
            'shipping_address' => '123 Test Street',
        ]);

        // Проверяем успешный ответ
        $response->assertStatus(201);
        $response->assertJson(['message' => 'Order created successfully']);

        // Проверяем, что заказ был добавлен в базу данных
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'total' => $product->price * 2,
            'payment_method' => 'credit_card',
            'shipping_address' => '123 Test Street',
        ]);

        // Проверяем, что товары были добавлены в заказ
        $this->assertDatabaseHas('order_items', [
            'order_id' => 1,
            'product_id' => $product->id,
            'quantity' => 2,
        ]);

        // Проверяем, что корзина была очищена
        $this->assertDatabaseMissing('carts', [
            'user_id' => $user->id,
        ]);
    }
}
