<?php

use App\Enums\DeliveryStatus;
use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
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
            $table->string('order_no')->unique();
            $table->foreignId('user_id')->constrained()->nullable();
            $table->enum('delivery_status', [DeliveryStatus::Delivery->value, DeliveryStatus::Pickup->value])->nullable();
            $table->enum('status', [OrderStatus::Pending->value, OrderStatus::Delivery->value, OrderStatus::Cancel->value, OrderStatus::Complete->value, OrderStatus::Shipping->value, OrderStatus::Mixed->value])->default(OrderStatus::Pending->value)->nullable();
            $table->decimal('shipping_fee', 10, 2)->nullable();
            $table->enum('payment_method', [PaymentMethod::Cash->value, PaymentMethod::HirePurchase->value])->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->decimal('total_discount_amount', 10, 2)->nullable();
            $table->softDeletes();
            $table->timestamps();
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
