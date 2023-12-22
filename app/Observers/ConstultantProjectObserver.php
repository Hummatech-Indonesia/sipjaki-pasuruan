<?php

namespace App\Observers;

use App\Models\ConsultantProject;
use Faker\Provider\Uuid;

class ConstultantProjectObserver
{
    /**
     * Handle the ConsultantProject "creating" event.
     */
    public function creating(ConsultantProject $consultantProject): void
    {
        $consultantProject->id = Uuid::uuid();
    }

    /**
     * Handle the ConsultantProject "created" event.
     */
    public function created(ConsultantProject $consultantProject): void
    {
        //
    }

    /**
     * Handle the ConsultantProject "updated" event.
     */
    public function updated(ConsultantProject $consultantProject): void
    {
        //
    }

    /**
     * Handle the ConsultantProject "deleted" event.
     */
    public function deleted(ConsultantProject $consultantProject): void
    {
        //
    }

    /**
     * Handle the ConsultantProject "restored" event.
     */
    public function restored(ConsultantProject $consultantProject): void
    {
        //
    }

    /**
     * Handle the ConsultantProject "force deleted" event.
     */
    public function forceDeleted(ConsultantProject $consultantProject): void
    {
        //
    }
}
