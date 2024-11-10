<?php

namespace Database\Factories;

use App\Enums\DeliveryStatus;
use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_no'=>fake()->word,
            'user_id' => User::factory(),
            'delivery_status'=>fake()->randomElement([DeliveryStatus::Delivery,DeliveryStatus::Pickup]),
            'status'=>fake()->randomElement([OrderStatus::Pending,OrderStatus::Delivery,OrderStatus::Complete,OrderStatus::Cancel,OrderStatus::Mixed,OrderStatus::Shipping]),
            'shipping_fee'=>fake()->numberBetween(100,300),
            'payment_method'=>fake()->randomElement([PaymentMethod::Cash,PaymentMethod::HirePurchase]),
            'total_price'=>fake()->numberBetween(400,800),
            'total_discount_amount'=>fake()->numberBetween(10,20),
        ];
    }
}
