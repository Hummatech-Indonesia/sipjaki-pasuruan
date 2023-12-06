<?php

namespace App\Observers;

use App\Models\ContractCategory;
use Faker\Provider\Uuid;

class ContractCategoryObserver
{
    /**
     * Handle the ContractCategory "creating" event.
     */
    public function creating(ContractCategory $contractCategory): void
    {
        $contractCategory->id = Uuid::uuid();
    }

}
