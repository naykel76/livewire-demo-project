<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'customer' => $this->faker->name(),
            'order_date' => \Carbon\Carbon::today()->subDays(rand(-365, 365)),
            'status' => $this->faker->randomElement(['success', 'failed', 'processing']),
            'amount' => $this->faker->numberBetween(500, 9000),
            'payment_id' => Str::random(10)
        ];
    }
}
