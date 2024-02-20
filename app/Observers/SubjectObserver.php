<?php

namespace App\Observers;

use App\Models\Subject;
use Illuminate\Support\Facades\Storage;

class SubjectObserver
{
    /**
     * Handle the Subject "created" event.
     */
    public function created(Subject $subject): void
    {
        //
    }

    /**
     * Handle the Subject "updated" event.
     */
    public function updated(Subject $subject): void
    {
        if ($subject->isDirty('img')) {
            Storage::disk('public')->delete($subject->getOriginal('img'));
        }
    }

    /**
     * Handle the Subject "deleted" event.
     */
    public function deleted(Subject $subject): void
    {
        //
    }

    /**
     * Handle the Subject "restored" event.
     */
    public function restored(Subject $subject): void
    {
        //
    }

    /**
     * Handle the Subject "force deleted" event.
     */
    public function forceDeleted(Subject $subject): void
    {
        if (! is_null($subject->img)) {
            Storage::disk('public')->delete($subject->img);
        }
    }
}
