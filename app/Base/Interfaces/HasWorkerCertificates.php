<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface HasWorkerCerificates
{
    /**
     * Get all of the trainings for the HasTrainings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workerCertificates(): HasMany;
}
