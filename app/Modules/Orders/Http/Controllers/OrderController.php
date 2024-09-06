<?php
namespace App\Modules\Orders\Http\Controllers;

use App\Modules\Orders\Models\Order;
use App\Modules\Cart\Services\CartService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    // Оформление заказа
    public function checkout(Request $request)
    {
        $user = $request->user();
        $cartItems = $this->cartService->getCartItems($user->id);

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        // Создание заказа
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $cartItems->sum(fn($item) => $item->quantity * $item->product->price),
            'payment_method' => $request->payment_method,
            'shipping_address' => $request->shipping_address,
        ]);

        // Перенос товаров из корзины в заказ
        foreach ($cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Очищаем корзину
        $this->cartService->clearCart($user->id);

        // Здесь можно добавить логику для интеграции с платежной системой

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
    }

    // Получение списка заказов пользователя
    public function getUserOrders(Request $request)
    {
        $user = $request->user();
        $orders = Order::where('user_id', $user->id)->with('items.product')->get();
        return response()->json($orders);
    }
}
