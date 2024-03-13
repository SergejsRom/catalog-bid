<?php

namespace App\Observers;

use App\Models\Bid;

class BidObserver
{
    /**
     * Handle the Bid "created" event.
     */
    public function creating(Bid $bid): void
    {
        if (auth()->check()) {
            $bid->user_id = auth()->id();
        }
    }

    /**
     * Handle the Bid "updated" event.
     */
    public function updated(Bid $bid): void
    {
        //
    }

    /**
     * Handle the Bid "deleted" event.
     */
    public function deleted(Bid $bid): void
    {
        //
    }

    /**
     * Handle the Bid "restored" event.
     */
    public function restored(Bid $bid): void
    {
        //
    }

    /**
     * Handle the Bid "force deleted" event.
     */
    public function forceDeleted(Bid $bid): void
    {
        //
    }
}
