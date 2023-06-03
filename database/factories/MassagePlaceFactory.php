<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MassagePlace>
 */
class MassagePlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'area' => fake()->address(),
            'address' => fake()->address(),
            'rate' => fake()->numberBetween(1, 5),
            'service' => fake()->country(),
            'review_content' => fake()->paragraph(),
            'phone_number' => fake()->phoneNumber(),
            'advantage' => fake()->paragraph(),
            'max_price' => fake()->numberBetween(1000, 500000),
            'min_price' => fake()->numberBetween(1000, 500000),
        ];
    }
}
