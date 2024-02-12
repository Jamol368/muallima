<?php

namespace Database\Seeders;

use App\Models\TeacherCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherCategory::factory(10)
            ->create();
    }
}
