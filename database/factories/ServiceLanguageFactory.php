<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ServiceLanguage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceLanguage>
 */
class ServiceLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message_place_id' => fake()->numberBetween(1, 10),
            'language' => fake()->country()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (ServiceLanguage $serviceLanguage) {
            $serviceLanguage->timestamps = false;
        });
    }
}
