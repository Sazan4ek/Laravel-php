<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customerFirstName' => fake()->firstName(),
            'customerLastName' => fake()->lastName(),
            'customerEmail' => fake()->unique()->email(),
            'customerPhone' => fake()->phoneNumber(),
            'booked_at' => fake()->date('Y-m-d'),
            'booked_until' => fake()->date('Y-m-d'),
        ];
    }
}
