<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


interface HasFundSource
{
    /**
     * fundSource
     *
     * @return BelongsTo
     */
    public function fundSource(): BelongsTo;
}
