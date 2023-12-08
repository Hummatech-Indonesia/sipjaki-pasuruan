<?php

namespace App\Observers;

use App\Models\Field;
use Faker\Provider\Uuid;

class FieldObserver
{
    /**
     * creating
     *
     * @param  mixed $field
     * @return void
     */
    public function creating(Field $field): void
    {
        $field->id = Uuid::uuid();
    }
}
