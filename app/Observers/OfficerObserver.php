<?php

namespace App\Observers;

use App\Models\Officer;
use Faker\Provider\Uuid;

class OfficerObserver
{
    /**
     * Handle the Officer "creating" event.
     */
    public function creating(Officer $officer): void
    {
        $officer->id = Uuid::uuid();
        $officer->service_provider_id = auth()->user()->serviceProvider->id;
    }

    /**
     * Handle the Officer "created" event.
     */
    public function created(Officer $officer): void
    {
        //
    }

    /**
     * Handle the Officer "updated" event.
     */
    public function updated(Officer $officer): void
    {
        //
    }

    /**
     * Handle the Officer "deleted" event.
     */
    public function deleted(Officer $officer): void
    {
        //
    }

    /**
     * Handle the Officer "restored" event.
     */
    public function restored(Officer $officer): void
    {
        //
    }

    /**
     * Handle the Officer "force deleted" event.
     */
    public function forceDeleted(Officer $officer): void
    {
        //
    }
}
