<?php

namespace App\Observers;

use App\Models\Privacy;

class PrivacyObserver
{
    public function saving(Privacy $privacy)
    {
        $privacy->slug = $privacy->createSlug($privacy->title, $privacy->id ? $privacy->id : 0);
    }
    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\Privacy  $privacy
     * @return void
     */
    public function created(Privacy $privacy)
    {
        //
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\Privacy  $privacy
     * @return void
     */
    public function updated(Privacy $privacy)
    {
        //
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\Privacy  $privacy
     * @return void
     */
    public function deleted(Privacy $privacy)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\Privacy  $privacy
     * @return void
     */
    public function restored(Privacy $privacy)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\Privacy  $privacy
     * @return void
     */
    public function forceDeleted(Privacy $privacy)
    {
        //
    }
}
