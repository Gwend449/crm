<?php

namespace Database\Factories;

use App\Models\Client;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'service_name' => fake()->randomElement(['Tint', 'Polish', 'Car Wash', 'Chemical Clean']),
            'price' => fake()->randomFloat(2, 50, 2000),
            'date' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'status' => fake()->randomElement(['new','pending', 'completed', 'canceled']),
        ];
    }
}
