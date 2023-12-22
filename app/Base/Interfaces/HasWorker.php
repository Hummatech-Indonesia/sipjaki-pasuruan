<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasWorker
{
    /**
     * worker
     *
     * @return BelongsTo
     */
    public function worker(): BelongsTo;
}
