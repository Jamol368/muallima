<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 100000),
            'test_type_id' => rand(1, 10),
            'subject_id' => rand(1, 10),
            'true_answers' => rand(10, 60),
            'wrong_answers' => rand(10, 60),
            'score' => rand(20, 100),
        ];
    }
}
