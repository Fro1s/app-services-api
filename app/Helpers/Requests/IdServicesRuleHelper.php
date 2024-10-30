<?php

namespace App\Helpers\Requests;

class IdServicesRuleHelper
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
            'exists:services,id',
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
