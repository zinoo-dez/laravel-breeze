<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'order_id'=>Order::factory(),
            'product_id'=>Product::factory(),
            'shipping_address_id'=>ShippingAddress::factory(),
            'status'=>fake()->randomElement([OrderStatus::Pending,OrderStatus::Delivery,OrderStatus::Complete,OrderStatus::Cancel,OrderStatus::Missed,OrderStatus::Shipping]),
            'qty'=>fake()->randomNumber(),
            'price'=>fake()->randomFloat(2,1,100),
            'discount_type'=>fake()->randomElement(['percentage','fixed']),
            'discount_value'=>fake()->numberBetween(10,30),
        ];
    }
}
