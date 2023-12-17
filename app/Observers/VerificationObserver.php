<?php

namespace App\Observers;

use App\Models\Verification;
use Faker\Provider\Uuid;

class VerificationObserver
{
    /**
     * Handle the Verification "creating" event.
     */
    public function creating(Verification $verification): void
    {
        $verification->id = Uuid::uuid();
    }
    /**
     * Handle the Verification "created" event.
     */
    public function created(Verification $verification): void
    {
        //
    }

    /**
     * Handle the Verification "updated" event.
     */
    public function updated(Verification $verification): void
    {
        //
    }

    /**
     * Handle the Verification "deleted" event.
     */
    public function deleted(Verification $verification): void
    {
        //
    }

    /**
     * Handle the Verification "restored" event.
     */
    public function restored(Verification $verification): void
    {
        //
    }

    /**
     * Handle the Verification "force deleted" event.
     */
    public function forceDeleted(Verification $verification): void
    {
        //
    }
}
