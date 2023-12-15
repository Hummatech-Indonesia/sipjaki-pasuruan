<?php

namespace App\Observers;

use App\Models\ClassificationTraining;
use Faker\Provider\Uuid;

class ClassificationTrainingObserver
{
    /**
     * Handle the ClassificationTraining "creating" event.
     */
    public function creating(ClassificationTraining $classificationTraining): void
    {
        $classificationTraining->id = Uuid::uuid();
    }

    /**
     * Handle the ClassificationTraining "created" event.
     */
    public function created(ClassificationTraining $classificationTraining): void
    {
        //
    }

    /**
     * Handle the ClassificationTraining "updated" event.
     */
    public function updated(ClassificationTraining $classificationTraining): void
    {
        //
    }

    /**
     * Handle the ClassificationTraining "deleted" event.
     */
    public function deleted(ClassificationTraining $classificationTraining): void
    {
        //
    }

    /**
     * Handle the ClassificationTraining "restored" event.
     */
    public function restored(ClassificationTraining $classificationTraining): void
    {
        //
    }

    /**
     * Handle the ClassificationTraining "force deleted" event.
     */
    public function forceDeleted(ClassificationTraining $classificationTraining): void
    {
        //
    }
}
