<?php

namespace App\Observers;

use App\Models\Tutorial;

class TutorialObserver
{
    public function saving(Tutorial $tutorial)
    {
        $tutorial->slug = $tutorial->createSlug($tutorial->title, $tutorial->id ? $tutorial->id : 0);
    }
    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function created(Tutorial $tutorial)
    {
        //
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function updated(Tutorial $tutorial)
    {
        //
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function deleted(Tutorial $tutorial)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function restored(Tutorial $tutorial)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return void
     */
    public function forceDeleted(Tutorial $tutorial)
    {
        //
    }
}
