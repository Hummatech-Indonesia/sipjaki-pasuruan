<?php

namespace App\Rules;

use App\Enums\TypeBusinessEntityEnum;
use App\Enums\TypeOfBusinessEntityEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class TypeOfBussinessEntityRule implements Rule
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
        return in_array($value, [TypeOfBusinessEntityEnum::EXECUTOR->value, TypeOfBusinessEntityEnum::CONSULTANT->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Jenis badan usaha yang anda inputkan tidak valid';
    }
}
