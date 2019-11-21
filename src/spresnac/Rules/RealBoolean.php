<?php

namespace spresnac\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class RealBoolean.
 *
 * To check on several values that can be interpreted as 'boolean'
 */
class RealBoolean implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if ($value === true || $value === false) {
            return true;
        }
        $accept = [0, 1, '0', '1', '"true"', '"false"', 'true', 'false', '"j"', '"n"', 'j', 'n'];

        return in_array(strtolower($value), $accept, true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute must be a boolean value';
    }
}
