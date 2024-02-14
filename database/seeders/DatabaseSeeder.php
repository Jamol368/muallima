<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//            ProvinceSeeder::class,
//            TownSeeder::class,
//            SchoolSeeder::class,
//            SubjectSeeder::class,
//            TeacherCategorySeeder::class,
//
//            UserTypeSeeder::class,
//            UserSeeder::class,
//            UserInfoSeeder::class,
//            UserTeacherSeeder::class,
//            UserPupilSeeder::class,
//            UserStudentSeeder::class,
//
//            TestTypeSeeder::class,
//            TestSeeder::class,
//            AnswerSeeder::class,
//            ResultSeeder::class,
            ResultSessionSeeder::class,
        ]);
    }
}
