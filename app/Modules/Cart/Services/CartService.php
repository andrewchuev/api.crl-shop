<?php

namespace App\Modules\Cart\Services;

use App\Modules\Cart\Repositories\CartRepository;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    // Получение всех товаров в корзине для пользователя
    public function getCartItems($userId)
    {
        return $this->cartRepository->getCartItemsByUser($userId);
    }

    // Добавление товара в корзину
    public function addToCart($userId, $productId, $quantity)
    {
        // Логика, например, проверка на максимальное количество товара
        if ($quantity <= 0) {
            throw new \Exception('Quantity must be greater than zero');
        }

        return $this->cartRepository->addToCart($userId, $productId, $quantity);
    }

    // Обновление товара в корзине
    public function updateCartItem($cartItemId, $quantity)
    {
        if ($quantity <= 0) {
            throw new \Exception('Quantity must be greater than zero');
        }

        return $this->cartRepository->updateCartItem($cartItemId, $quantity);
    }

    // Удаление товара из корзины
    public function deleteCartItem($cartItemId)
    {
        return $this->cartRepository->deleteCartItem($cartItemId);
    }

    // Очистка корзины пользователя
    public function clearCart($userId)
    {
        return $this->cartRepository->clearCartByUser($userId);
    }
}
