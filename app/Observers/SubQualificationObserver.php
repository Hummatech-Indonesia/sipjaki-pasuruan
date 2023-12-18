<?php

namespace App\Observers;

use App\Models\SubQualification;
use Faker\Provider\Uuid;

class SubQualificationObserver
{
    /**
     * Handle the SubQualification "creating" event.
     */
    public function creating(SubQualification $subQualification): void
    {
        $subQualification->id = Uuid::uuid();
    }

    /**
     * Handle the SubQualification "created" event.
     */
    public function created(SubQualification $subQualification): void
    {
        //
    }

    /**
     * Handle the SubQualification "updated" event.
     */
    public function updated(SubQualification $subQualification): void
    {
        //
    }

    /**
     * Handle the SubQualification "deleted" event.
     */
    public function deleted(SubQualification $subQualification): void
    {
        //
    }

    /**
     * Handle the SubQualification "restored" event.
     */
    public function restored(SubQualification $subQualification): void
    {
        //
    }

    /**
     * Handle the SubQualification "force deleted" event.
     */
    public function forceDeleted(SubQualification $subQualification): void
    {
        //
    }
}
