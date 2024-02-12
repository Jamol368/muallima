<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPupil>
 */
class UserPupilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_info_id' => rand(1, 1000),
            'school_id' => rand(1, 2000),
            'school_grade' => rand(1, 4),
        ];
    }
}
