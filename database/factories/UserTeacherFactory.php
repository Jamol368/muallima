<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTeacher>
 */
class UserTeacherFactory extends Factory
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
            'teacher_category_id' => rand(1, 10),
            'subject_id' => rand(1, 20),
        ];
    }
}
