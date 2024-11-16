<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'store_id' => Store::factory(),
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),
            'name' => fake()->name(),
            'sorting' => fake()->numberBetween(1, 100),
            'description' => fake()->text(),
        ];
    }

    public function order_detail(){
        return $this->belongsTo(OrderDetail::class);
    }
}
