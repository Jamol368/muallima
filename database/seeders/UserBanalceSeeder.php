<?php

namespace Database\Seeders;

use App\Models\UserBanalce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBanalceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserBanalce::factory(10000)
            ->create();
    }
}
