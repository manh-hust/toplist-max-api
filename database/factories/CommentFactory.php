<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'massage_place_id' => fake()->numberBetween(1, 10),
            'nickname' => fake()->name(),
            'email_address' => fake()->email(),
            'content' => fake()->name(),
        ];
    }
}
