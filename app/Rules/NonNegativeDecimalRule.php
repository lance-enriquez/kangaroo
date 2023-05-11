<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * NonNegativeDecimalRule class.
 *
 * @package App\Rules
 * @author Lorenzo Enriquez
 * @since 2023.05.09
 */
class NonNegativeDecimalRule implements Rule
{
    /**
     * checks if the value passes the condition.
     *
     * @param $attribute
     * @param $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return (double) number_format($value, 2) >= 0.0;
    }

    /**
     * Returns message when value doesn't pass the condition.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute must be a positive decimal.';
    }
}
