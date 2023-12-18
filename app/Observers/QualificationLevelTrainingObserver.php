<?php

namespace App\Observers;

use App\Models\QualificationLevelTraining;
use Faker\Provider\Uuid;

class QualificationLevelTrainingObserver
{
    /**
     * Handle the QualificationLevelTraining "creating" event.
     */
    public function creating(QualificationLevelTraining $qualificationLevelTraining): void
    {
        $qualificationLevelTraining->id = Uuid::uuid();
    }

    /**
     * Handle the QualificationLevelTraining "created" event.
     */
    public function created(QualificationLevelTraining $qualificationLevelTraining): void
    {
        //
    }

    /**
     * Handle the QualificationLevelTraining "updated" event.
     */
    public function updated(QualificationLevelTraining $qualificationLevelTraining): void
    {
        //
    }

    /**
     * Handle the QualificationLevelTraining "deleted" event.
     */
    public function deleted(QualificationLevelTraining $qualificationLevelTraining): void
    {
        //
    }

    /**
     * Handle the QualificationLevelTraining "restored" event.
     */
    public function restored(QualificationLevelTraining $qualificationLevelTraining): void
    {
        //
    }

    /**
     * Handle the QualificationLevelTraining "force deleted" event.
     */
    public function forceDeleted(QualificationLevelTraining $qualificationLevelTraining): void
    {
        //
    }
}
