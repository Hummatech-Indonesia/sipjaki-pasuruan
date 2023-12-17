<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


interface HasAssociation
{
    /**
     * association
     *
     * @return BelongsTo
     */
    public function association(): BelongsTo;
}
