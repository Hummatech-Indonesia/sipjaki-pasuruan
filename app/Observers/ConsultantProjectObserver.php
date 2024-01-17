<?php

namespace App\Observers;

use App\Models\ConsultantProject;
use Faker\Provider\Uuid;

class ConsultantProjectObserver
{
    /**
     * Handle the ConsultantProject "created" event.
     */
    public function creating(ConsultantProject $consultantProject): void
    {
        $consultantProject->id = Uuid::uuid();
        $consultantProject->dinas_id = auth()->user()->dinas->id;
    }
}
