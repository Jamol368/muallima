<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserType>
 */
class UserTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'slug' => fake()->unique()->slug,
            'icon' => fake()->optional(0.3)->randomElement(['pupil', 'student', 'teacher']),
            'img' => fake()->optional()->image('public/storage/usertype'),
            'description' => fake()->text(255),
        ];
    }
}
