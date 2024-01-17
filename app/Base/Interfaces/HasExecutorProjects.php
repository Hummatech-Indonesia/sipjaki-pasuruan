<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasMany;


interface HasExecutorProjects
{
    /**
     * Get all of the executorProjects for the HasexecutorProjects
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function executorProjects(): HasMany;
}
