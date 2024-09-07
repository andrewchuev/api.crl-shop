<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID пользователя
            $table->decimal('total', 8, 2); // Общая сумма заказа
            $table->string('status')->default('pending'); // Статус заказа: pending, paid, shipped, etc.
            $table->string('payment_method'); // Способ оплаты
            $table->string('shipping_address'); // Адрес доставки
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
