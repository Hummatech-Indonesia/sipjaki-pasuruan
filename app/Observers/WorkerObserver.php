<?php

namespace App\Observers;

use App\Models\Worker;
use Faker\Provider\Uuid;

class WorkerObserver
{

    /**
     * creating
     *
     * @param  mixed $worker
     * @return void
     */
    public function creating(Worker $worker): void
    {
        $worker->id = Uuid::uuid();
    }

    /**
     * Handle the Worker "created" event.
     */
    public function created(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "updated" event.
     */
    public function updated(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "deleted" event.
     */
    public function deleted(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "restored" event.
     */
    public function restored(Worker $worker): void
    {
        //
    }

    /**
     * Handle the Worker "force deleted" event.
     */
    public function forceDeleted(Worker $worker): void
    {
        //
    }
}
