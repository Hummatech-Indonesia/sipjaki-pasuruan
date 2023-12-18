<?php

namespace App\Observers;

use App\Models\SubClassificationTraining;
use Faker\Provider\Uuid;

class SubClassificationTrainingObserver
{
    /**
     * Handle the SubClassificationTraining "creating" event.
     */
    public function creating(SubClassificationTraining $subClassificationTraining): void
    {
        $subClassificationTraining->id = Uuid::uuid();
    }

    /**
     * Handle the SubClassificationTraining "created" event.
     */
    public function created(SubClassificationTraining $subClassificationTraining): void
    {
        //
    }

    /**
     * Handle the SubClassificationTraining "updated" event.
     */
    public function updated(SubClassificationTraining $subClassificationTraining): void
    {
        //
    }

    /**
     * Handle the SubClassificationTraining "deleted" event.
     */
    public function deleted(SubClassificationTraining $subClassificationTraining): void
    {
        //
    }

    /**
     * Handle the SubClassificationTraining "restored" event.
     */
    public function restored(SubClassificationTraining $subClassificationTraining): void
    {
        //
    }

    /**
     * Handle the SubClassificationTraining "force deleted" event.
     */
    public function forceDeleted(SubClassificationTraining $subClassificationTraining): void
    {
        //
    }
}
