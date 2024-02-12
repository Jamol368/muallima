<?php

namespace Database\Factories;

use App\Models\Province;
use App\Models\UserTeacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $province = Province::all()->random(1)->first();

        return [
            'user_id' => rand(1, 10000),
            'province_id' => $province['id'],
            'town_id' => $province->towns->random(1)->first()['id'],
            'user_type_id' => rand(1, 10),
        ];
    }
}
