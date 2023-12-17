<?php

namespace App\Rules;

use App\Enums\FormOfBusinessEntityEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class FormOfBusinessEntityRule implements Rule
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
        return in_array($value, [FormOfBusinessEntityEnum::CV->value, FormOfBusinessEntityEnum::PT->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Bentuk badan usaha yang anda inputkan tidak valid';
    }
}
