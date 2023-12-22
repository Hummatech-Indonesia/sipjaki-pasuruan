<?php

namespace App\Base\Interfaces;


use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneExecutorProject
{
    /**
     * Get the dinas that owns the HasOneDinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function executorProject(): HasOne;
}
