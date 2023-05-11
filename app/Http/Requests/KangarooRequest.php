<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Rules\NonNegativeDecimalRule;

/**
 * KangarooRequest class.
 *
 * @package App\Http\Requests
 * @author Lorenzo Enriquez
 * @since 2023.05.09
 */
class KangarooRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'         => 'required|string',
            'nickname'     => 'nullable|string',
            'weight'       => [
                'required',
                'decimal:2,2',
                new NonNegativeDecimalRule()
            ],
            'height'       => [
                'required',
                'decimal:2,2',
                new NonNegativeDecimalRule()
            ],
            'gender'       => 'required|in:F,M',
            'color'        => 'nullable|string',
            'is_friendly'  => 'nullable|boolean',
            'birth_date'   => 'required|date_format:Y-m-d',
        ];
    }

    /**
     * Returns messages when value doesn't pass the conditions.
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required'          => 'Name is a required field.',
            'name.string'            => 'Name should be a string.',
            'name.unique'            => 'The name is already registered.',

            'nickname.string'        => 'Nickname should be a string.',

            'weight.required'        => 'Weight is a required field.',
            'weight.decimal'         => 'Weight should be in decimal.',
            'weight.regex'           => 'Weight should be a positive value.',

            'height.required'        => 'Height is a required field.',
            'height.decimal'         => 'Height should be in decimal.',
            'height.regex'           => 'Height should be a positive value.',

            'gender.required'        => 'Gender is a required field.',
            'gender.in'              => 'Gender should either be "M" or "F".',

            'color.string'           => 'Color should be a string.',

            'is_friendly.boolean'    => 'Friendliness should be a boolean.',

            'birth_date.required'    => 'Birth date is a required field.',
            'birth_date.date_format' => 'Birth date should follow this format: "YYYY-MM-DD".',
        ];
    }
}
