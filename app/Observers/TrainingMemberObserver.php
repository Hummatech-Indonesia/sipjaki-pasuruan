<?php

namespace App\Observers;

use App\Models\TrainingMember;
use Faker\Provider\Uuid;

class TrainingMemberObserver
{
    /**
     * Handle the TrainingMember "creating" event.
     */
    public function creating(TrainingMember $trainingMember): void
    {
        $trainingMember->id = Uuid::uuid();
    }
}
