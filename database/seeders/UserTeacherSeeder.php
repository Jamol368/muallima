<?php

namespace Database\Seeders;

use App\Models\UserTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserTeacher::factory(10000)
            ->create();
    }
}
