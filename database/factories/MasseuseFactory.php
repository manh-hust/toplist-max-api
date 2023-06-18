<?php

namespace Database\Factories;

use App\Models\Masseuse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Masseuse>
 */
class MasseuseFactory extends Factory
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
            'age' => fake()->numberBetween(18, 50),
            'image' => fake()->imageUrl(),
            'experience' => fake()->numberBetween(1, 10),
            'service' => fake()->country(),
            'massage_place_id' => fake()->numberBetween(1, 10)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Masseuse $masseuse) {
            $masseuse->timestamps = false;
        });
    }
}
