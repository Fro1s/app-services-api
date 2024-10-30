<?php

namespace App\Helpers\Requests;

class IdCategoryRuleHelper
{
    /**
     * Get the validation rules for the admin ID.
     *
     * @return array The validation rules.
     */
    public static function rule(): array
    {
        return [
            'required',
            'string',
            'exists:categories,id',
        ];
        
    }

    /**
     * Get the attributes for the validation rule.
     *
     * @return array
     */
    public static function attributes(): array
    {
        return [
            'id' => 'id'
        ];
    }
}
