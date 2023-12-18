<?php

namespace App\Observers;

use App\Models\QualificationTraining;
use Faker\Provider\Uuid;

class QualificationTrainingObserver
{
    /**
     * Handle the QualificationLevelTraining "creating" event.
     */
    public function creating(QualificationTraining $qualificationLevelTraining): void
    {
        $qualificationLevelTraining->id = Uuid::uuid();
    }

    /**
     * Handle the QualificationTraining "created" event.
     */
    public function created(QualificationTraining $qualificationTraining): void
    {
        //
    }

    /**
     * Handle the QualificationTraining "updated" event.
     */
    public function updated(QualificationTraining $qualificationTraining): void
    {
        //
    }

    /**
     * Handle the QualificationTraining "deleted" event.
     */
    public function deleted(QualificationTraining $qualificationTraining): void
    {
        //
    }

    /**
     * Handle the QualificationTraining "restored" event.
     */
    public function restored(QualificationTraining $qualificationTraining): void
    {
        //
    }

    /**
     * Handle the QualificationTraining "force deleted" event.
     */
    public function forceDeleted(QualificationTraining $qualificationTraining): void
    {
        //
    }
}
