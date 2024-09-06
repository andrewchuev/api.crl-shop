<?php

namespace App\Modules\Cart\Repositories;

use App\Modules\Cart\Models\Cart;

class CartRepository
{
    // Получение всех товаров в корзине пользователя
    public function getCartItemsByUser($userId)
    {
        return Cart::where('user_id', $userId)
            ->with('product') // Загружаем связанные продукты
            ->get();
    }

    // Добавление товара в корзину или обновление количества, если товар уже добавлен
    public function addToCart($userId, $productId, $quantity)
    {
        return Cart::updateOrCreate(
            [
                'user_id' => $userId,
                'product_id' => $productId,
            ],
            [
                'quantity' => $quantity,
            ]
        );
    }

    // Обновление количества товара в корзине
    public function updateCartItem($cartItemId, $quantity)
    {
        $cartItem = Cart::findOrFail($cartItemId);
        $cartItem->update(['quantity' => $quantity]);

        return $cartItem;
    }

    // Удаление товара из корзины
    public function deleteCartItem($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);

        return $cartItem->delete();
    }

    // Очистка корзины пользователя
    public function clearCartByUser($userId)
    {
        return Cart::where('user_id', $userId)->delete();
    }
}
