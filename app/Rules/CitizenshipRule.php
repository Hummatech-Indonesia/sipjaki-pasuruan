<?php

namespace App\Rules;

use App\Enums\CitizenshipEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class CitizenshipRule implements Rule
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
        return in_array($value, [CitizenshipEnum::WNI->value, CitizenshipEnum::WNA->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Kewarganegaraan anda inputkan tidak valid';
    }
}
