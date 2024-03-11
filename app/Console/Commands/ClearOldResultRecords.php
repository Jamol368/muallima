<?php

namespace App\Console\Commands;

use App\Models\Result;
use Illuminate\Console\Command;

class ClearOldResultRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-old-result-records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove old results';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $weekAgo = now()->subWeek(); // Get the date one week ago
        Result::where('created_at', '<', $weekAgo)->delete();
        $this->info('Old records deleted successfully.');
    }
}
