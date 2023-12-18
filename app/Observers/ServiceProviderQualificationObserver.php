<?php

namespace App\Observers;

use App\Models\ServiceProviderQualification;
use Faker\Provider\Uuid;

class ServiceProviderQualificationObserver
{
    /**
     * Handle the ServiceProviderQualification "created" event.
     */
    public function creating(ServiceProviderQualification $serviceProviderQualification): void
    {
        $serviceProviderQualification->id = Uuid::uuid();
    }
}
