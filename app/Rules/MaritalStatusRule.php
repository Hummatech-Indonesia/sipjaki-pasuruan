<?php

namespace App\Rules;

use App\Enums\MaritalStatusEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class MaritalStatusRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return in_array($value, [MaritalStatusEnum::SINGLE->value, MaritalStatusEnum::MARRY->value, MaritalStatusEnum::DIVORCED->value, MaritalStatusEnum::DEATH_DIVORCE->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Agama yang anda inputkan tidak valid';
    }
}
