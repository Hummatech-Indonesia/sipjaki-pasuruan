<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface HasOneVerification {
    /**
     * verification
     *
     * @return HasOne
     */
    public function verification(): HasOne;
}
