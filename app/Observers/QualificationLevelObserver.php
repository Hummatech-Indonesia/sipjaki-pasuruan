<?php

namespace App\Observers;

use App\Models\QualificationLevel;
use Faker\Provider\Uuid;

class QualificationLevelObserver
{
    /**
     * Handle the QualificationLevel "creating" event.
     */
    public function creating(QualificationLevel $qualificationLevel): void
    {
        $qualificationLevel->id = Uuid::uuid();
    }

}
