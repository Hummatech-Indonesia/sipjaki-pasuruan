<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasServiceProviderProjects
{
    /**
     * Get all of the trainings for the HasTrainings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceProviderProjects(): HasMany;
}
