<?php

namespace App\Observers;

use App\Models\FoundingDeed;
use Faker\Provider\Uuid;

class FoundingDeedObserver
{

    /**
     * Handle the FoundingDeed "creating" event.
     */
    public function creating(FoundingDeed $foundingDeed): void
    {
        $foundingDeed->id = Uuid::uuid();
    }
    /**
     * Handle the FoundingDeed "created" event.
     */
    public function created(FoundingDeed $foundingDeed): void
    {
        //
    }

    /**
     * Handle the FoundingDeed "updated" event.
     */
    public function updated(FoundingDeed $foundingDeed): void
    {
        //
    }

    /**
     * Handle the FoundingDeed "deleted" event.
     */
    public function deleted(FoundingDeed $foundingDeed): void
    {
        //
    }

    /**
     * Handle the FoundingDeed "restored" event.
     */
    public function restored(FoundingDeed $foundingDeed): void
    {
        //
    }

    /**
     * Handle the FoundingDeed "force deleted" event.
     */
    public function forceDeleted(FoundingDeed $foundingDeed): void
    {
        //
    }
}
