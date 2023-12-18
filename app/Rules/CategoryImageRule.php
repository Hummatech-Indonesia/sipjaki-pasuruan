<?php

namespace App\Rules;

use App\Enums\UploadDiskEnum;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class CategoryImageRule implements Rule
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
        return in_array($value, [UploadDiskEnum::STRUCTUREORGANITATION->value, UploadDiskEnum::JOBANDFUNCTION->value, UploadDiskEnum::STRATEGICPLAN->value, UploadDiskEnum::FAQ->value, UploadDiskEnum::VIDEO->value]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Kategori yang anda inputkan tidak valid';
    }
}
