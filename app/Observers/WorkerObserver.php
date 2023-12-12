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
        $worker->service_provider_id = auth()->user()->serviceProvider->id;
    }
}
