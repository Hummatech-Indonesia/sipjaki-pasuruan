<?php

namespace App\Observers;

use App\Models\Rule;
use Faker\Provider\Uuid;

class RuleObserver
{
    /**
     * Handle the Rule "created" event.
     */
    public function creating(Rule $rule): void
    {
        $rule->id = Uuid::uuid();
    }
}
