<?php

namespace App\Observers;

use App\Models\ExecutorProject;
use Faker\Provider\Uuid;

class ExecutorProjectObserver
{
    /**
     * Handle the ExecutorProject "creating" event.
     */
    public function creating(ExecutorProject $executorProject): void
    {
        $executorProject->id = Uuid::uuid();
    }

    /**
     * Handle the ExecutorProject "created" event.
     */
    public function created(ExecutorProject $executorProject): void
    {
        //
    }

    /**
     * Handle the ExecutorProject "updated" event.
     */
    public function updated(ExecutorProject $executorProject): void
    {
        //
    }

    /**
     * Handle the ExecutorProject "deleted" event.
     */
    public function deleted(ExecutorProject $executorProject): void
    {
        //
    }

    /**
     * Handle the ExecutorProject "restored" event.
     */
    public function restored(ExecutorProject $executorProject): void
    {
        //
    }

    /**
     * Handle the ExecutorProject "force deleted" event.
     */
    public function forceDeleted(ExecutorProject $executorProject): void
    {
        //
    }
}
