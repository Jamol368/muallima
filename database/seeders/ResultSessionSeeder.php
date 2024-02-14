<?php

namespace Database\Seeders;

use App\Models\ResultSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResultSession::factory(100000)
            ->create();
    }
}
