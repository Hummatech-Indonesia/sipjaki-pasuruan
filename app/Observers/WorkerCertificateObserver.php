<?php

namespace App\Observers;

use App\Models\WorkerCertificate;
use Faker\Provider\Uuid;

class WorkerCertificateObserver
{
    /**
     * Handle the WorkerCertificate "creating" event.
     */
    public function creating(WorkerCertificate $workerCertificate): void
    {
        $workerCertificate->id = Uuid::uuid();
    }
    /**
     * Handle the WorkerCertificate "created" event.
     */
    public function created(WorkerCertificate $workerCertificate): void
    {
        //
    }

    /**
     * Handle the WorkerCertificate "updated" event.
     */
    public function updated(WorkerCertificate $workerCertificate): void
    {
        //
    }

    /**
     * Handle the WorkerCertificate "deleted" event.
     */
    public function deleted(WorkerCertificate $workerCertificate): void
    {
        //
    }

    /**
     * Handle the WorkerCertificate "restored" event.
     */
    public function restored(WorkerCertificate $workerCertificate): void
    {
        //
    }

    /**
     * Handle the WorkerCertificate "force deleted" event.
     */
    public function forceDeleted(WorkerCertificate $workerCertificate): void
    {
        //
    }
}
