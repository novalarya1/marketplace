<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'total_price' => fake()->randomFloat(2, 50000, 500000),
            'status' => fake()->randomElement(['pending', 'paid', 'shipped', 'delivered']),
        ];
    }
}
