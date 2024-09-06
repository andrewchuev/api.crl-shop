<?php
namespace App\Modules\Cart\Repositories;

use App\Modules\Cart\Models\Cart;

class CartRepository
{
    public function getCartItemsByUser($userId)
    {
        return Cart::where('user_id', $userId)->with('product')->get();
    }

    // Другие методы для работы с корзиной
}
