<?php

namespace App\Observers;

use App\Models\ServiceProvider;
use Faker\Provider\Uuid;

class ServiceProviderObserver
{
    /**
     * Handle the ServiceProvider "created" event.
     */
    public function creating(ServiceProvider $serviceProvider): void
    {
        $serviceProvider->id = Uuid::uuid();
    }
}
