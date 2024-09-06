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

    public function getCartItems($userId)
    {
        return $this->cartRepository->getCartItemsByUser($userId);
    }

    // Добавление, удаление и другие методы корзины
}
