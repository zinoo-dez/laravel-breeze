<?php

namespace Database\Factories;

use App\Enums\ActiveinactiveType;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_featured' => fake()->boolean(),
            'user_id' => User::factory(),
            'title'=>fake()->name(),
            'news_category_id'=>NewsCategory::factory(),
            'content'=>fake()->sentence(3),
            'status'=>fake()->randomElement([ActiveinactiveType::Active,ActiveinactiveType::Inactive]),
        ];
    }
}
