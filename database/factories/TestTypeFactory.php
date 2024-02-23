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
            'name' => fake()->words(2, true),
            'slug' => fake()->unique()->slug(2),
            'score' => fake()->randomElement([0.5, 1, 2, 2.5, 3, 4, 5]),
            'price' => fake()->randomElement([2000, 3000, 5000]),
            'questions' => fake()->randomElement([10, 20, 30]),
            'mins' => fake()->randomElement([20, 30, 60]),
            'img' => fake()->image('public/storage/test_type'),
            'description' => fake()->text(511),
            'order' => fake()->unique()->numberBetween(1, 10),
        ];
    }
}
