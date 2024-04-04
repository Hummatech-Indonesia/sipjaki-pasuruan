<?php

namespace App\Observers;

use App\Models\User;
use Faker\Provider\Uuid;
use App\Models\ServiceProvider;

class ServiceProviderObserver
{
    /**
     * creating
     *
     * @param  mixed $serviceProvider
     * @return void
     */
    public function creating(ServiceProvider $serviceProvider): void
    {
        $serviceProvider->id = Uuid::uuid();
    }

    /**
     * Handle the ServiceProvider "created" event.
     */
    public function created(ServiceProvider $serviceProvider): void
    {
        //
    }

    /**
     * Handle the ServiceProvider "updated" event.
     */
    public function updated(ServiceProvider $serviceProvider): void
    {
        //
    }

    /**
     * Handle the ServiceProvider "deleted" event.
     */
    public function deleted(ServiceProvider $serviceProvider): void
    {
       
    }

    /**
     * Handle the ServiceProvider "restored" event.
     */
    public function restored(ServiceProvider $serviceProvider): void
    {
        //
    }

    /**
     * Handle the ServiceProvider "force deleted" event.
     */
    public function forceDeleted(ServiceProvider $serviceProvider): void
    {
        //
    }
}
