<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;


interface HasConsultantProjects
{
    /**
     * Get all of the consultantProjects for the HasconsultantProjects
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function consultantProjects(): HasMany;
}
