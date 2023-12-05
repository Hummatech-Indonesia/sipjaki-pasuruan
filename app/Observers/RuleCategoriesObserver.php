<?php

namespace App\Observers;

use App\Models\RuleCategory;
use Faker\Provider\Uuid;

class RuleCategoriesObserver
{
    /**
     * Handle the RuleCategory "created" event.
     */
    public function creating(RuleCategory $ruleCategory): void
    {
        $ruleCategory->id = Uuid::uuid();
    }
}
