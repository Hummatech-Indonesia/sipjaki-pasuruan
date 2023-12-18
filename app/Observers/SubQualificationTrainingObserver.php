<?php

namespace App\Observers;

use App\Models\SubQualificationTraining;
use Faker\Provider\Uuid;

class SubQualificationTrainingObserver
{
    /**
     * Handle the SubQualificationTraining "created" event.
     */
    public function creating(SubQualificationTraining $subQualificationTraining): void
    {
        $subQualificationTraining->id = Uuid::uuid();
    }

    /**
     * Handle the SubQualificationTraining "created" event.
     */
    public function created(SubQualificationTraining $subQualificationTraining): void
    {
        //
    }

    /**
     * Handle the SubQualificationTraining "updated" event.
     */
    public function updated(SubQualificationTraining $subQualificationTraining): void
    {
        //
    }

    /**
     * Handle the SubQualificationTraining "deleted" event.
     */
    public function deleted(SubQualificationTraining $subQualificationTraining): void
    {
        //
    }

    /**
     * Handle the SubQualificationTraining "restored" event.
     */
    public function restored(SubQualificationTraining $subQualificationTraining): void
    {
        //
    }

    /**
     * Handle the SubQualificationTraining "force deleted" event.
     */
    public function forceDeleted(SubQualificationTraining $subQualificationTraining): void
    {
        //
    }
}
