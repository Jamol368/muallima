<?php

namespace App\Observers;

use App\Models\PostCategory;
use Illuminate\Support\Facades\Storage;

class PostCategoryObserver
{
    /**
     * Handle the PostCategory "created" event.
     */
    public function created(PostCategory $postCategory): void
    {
        //
    }

    /**
     * Handle the PostCategory "updated" event.
     */
    public function updated(PostCategory $postCategory): void
    {
        if ($postCategory->isDirty('img')) {
            Storage::disk('public')->delete($postCategory->getOriginal('img'));
        }
    }

    /**
     * Handle the PostCategory "deleted" event.
     */
    public function deleted(PostCategory $postCategory): void
    {
        //
    }

    /**
     * Handle the PostCategory "restored" event.
     */
    public function restored(PostCategory $postCategory): void
    {
        //
    }

    /**
     * Handle the PostCategory "force deleted" event.
     */
    public function forceDeleted(PostCategory $postCategory): void
    {
        if (! is_null($postCategory->img)) {
            Storage::disk('public')->delete($postCategory->img);
        }
    }
}
