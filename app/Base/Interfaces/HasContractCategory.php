<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasContractCategory
{
    /**
     * Get the contractCategory that owns the ContractCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contractCategory(): BelongsTo;
}
