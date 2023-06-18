<?php

namespace Database\Factories;

use App\Models\MasseuseServiceLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MasseuseServiceLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'masseuse_id' => fake()->numberBetween(1, 20),
            'language' => fake()->randomElement(['English', 'Japanese', 'Chinese', 'Korean', 'Vietnamese', 'Thai', 'Chinese'])
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (MasseuseServiceLanguage $masseuseServiceLanguage) {
            $masseuseServiceLanguage->timestamps = false;
        });
    }
}
