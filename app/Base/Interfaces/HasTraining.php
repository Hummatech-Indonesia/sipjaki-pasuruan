<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasTraining
{
    /**
     * Get the training that owns the HasOneDinas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function training(): BelongsTo;
}
