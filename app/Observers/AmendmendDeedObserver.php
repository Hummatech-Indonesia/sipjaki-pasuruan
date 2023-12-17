<?php

namespace App\Observers;

use App\Models\AmendmentDeed;
use Faker\Provider\Uuid;

class AmendmendDeedObserver
{
    /**
     * Handle the AmendmentDeed "creating" event.
     */
    public function creating(AmendmentDeed $amendmentDeed): void
    {
        $amendmentDeed->id = Uuid::uuid();
    }
    /**
     * Handle the AmendmentDeed "created" event.
     */
    public function created(AmendmentDeed $amendmentDeed): void
    {
        //
    }

    /**
     * Handle the AmendmentDeed "updated" event.
     */
    public function updated(AmendmentDeed $amendmentDeed): void
    {
        //
    }

    /**
     * Handle the AmendmentDeed "deleted" event.
     */
    public function deleted(AmendmentDeed $amendmentDeed): void
    {
        //
    }

    /**
     * Handle the AmendmentDeed "restored" event.
     */
    public function restored(AmendmentDeed $amendmentDeed): void
    {
        //
    }

    /**
     * Handle the AmendmentDeed "force deleted" event.
     */
    public function forceDeleted(AmendmentDeed $amendmentDeed): void
    {
        //
    }
}
