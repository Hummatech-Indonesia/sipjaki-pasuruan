<?php

namespace App\Observers;

use App\Models\ServiceProviderProject;
use Faker\Provider\Uuid;

class ServiceProviderProjectObserver
{
    /**
     * Handle the ServiceProviderProject "created" event.
     */
    public function creating(ServiceProviderProject $serviceProviderProject): void
    {
        $serviceProviderProject->id = Uuid::uuid();
    }
}
