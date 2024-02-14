<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResultSession>
 */
class ResultSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'result_id' => rand(1, 100000),
            'questions' => [
                fake()->randomElements(range(1, 1000), 10)
            ],
            'answers' => [
                fake()->randomElements(range(1, 1000), 10)
            ],
        ];
    }
}
