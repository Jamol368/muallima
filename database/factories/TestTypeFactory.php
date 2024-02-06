<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestType>
 */
class TestTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2),
            'slug' => fake()->unique()->slug(2),
            'score' => fake()->randomElement([30, 60, 100]),
            'price' => fake()->randomElement([2000, 3000, 5000]),
            'mins' => fake()->randomElement([30, 60]),
        ];
    }
}
