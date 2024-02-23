<?php

namespace App\Observers;

use App\Models\TestType;
use Illuminate\Support\Facades\Storage;

class TestTypeObserver
{
    /**
     * Handle the TestType "created" event.
     */
    public function created(TestType $testType): void
    {
        //
    }

    /**
     * Handle the TestType "updated" event.
     */
    public function updated(TestType $testType): void
    {
        if ($testType->isDirty('img')) {
            Storage::disk('public')->delete($testType->getOriginal('img'));
        }
    }

    /**
     * Handle the TestType "deleted" event.
     */
    public function deleted(TestType $testType): void
    {
        //
    }

    /**
     * Handle the TestType "restored" event.
     */
    public function restored(TestType $testType): void
    {
        //
    }

    /**
     * Handle the TestType "force deleted" event.
     */
    public function forceDeleted(TestType $testType): void
    {
        if (! is_null($testType->img)) {
            Storage::disk('public')->delete($testType->img);
        }
    }
}
