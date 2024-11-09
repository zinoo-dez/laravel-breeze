<?php

namespace Database\Factories;

use App\Enums\ActiveinactiveType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\advertisment>
 */
class AdvertismentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'location'=>fake()->sentence(3),
            'sorting' => fake()->randomNumber(1),
            'link' => fake()->url(),
            'expired_at'=>fake()->date(),
            'status'=>fake()->randomElement([ActiveinactiveType::Active,ActiveinactiveType::Inactive]),
        ];
    }
}
