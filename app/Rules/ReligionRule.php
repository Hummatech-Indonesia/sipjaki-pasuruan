<?php

namespace App\Rules;

use App\Enums\ReligionEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class ReligionRule implements Rule
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
        return in_array($value, [ReligionEnum::ISLAM->value, ReligionEnum::KRISTEN->value, ReligionEnum::KATHOLIK->value, ReligionEnum::HINDU->value, ReligionEnum::BUDHA->value, ReligionEnum::KONGHUCU->value, ReligionEnum::NOTFILLED->value]);
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
