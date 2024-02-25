<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_category_id' => fake()->numberBetween(1, 10),
            'title' => fake()->words(4, true),
            'slug' => fake()->unique()->slug,
            'description' => fake()->text,
            'img' => fake()->image('public/storage/post'),
            'content' => fake()->text,
            'view_count' => fake()->numberBetween(10, 100),
        ];
    }
}
