<?php

namespace App\Observers;

use App\Models\Blog;

class BlogObserver
{
    /**
     * Handle the blog "created" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function created(Blog $blog)
    {
        //
    }
    
    public function updating(Blog $blog)
    {
        //TODO: remove old file if the file is changed
    }
    
    /**
     * Handle the blog "updated" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function updated(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        //TODO: remove file
    }

    /**
     * Handle the blog "restored" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function restored(Blog $blog)
    {
        //
    }

    /**
     * Handle the blog "force deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function forceDeleted(Blog $blog)
    {
        //
    }
}
