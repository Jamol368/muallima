<?php

namespace Database\Seeders;

use App\Models\UserPupil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPupilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPupil::factory(10000)
            ->create();
    }
}
