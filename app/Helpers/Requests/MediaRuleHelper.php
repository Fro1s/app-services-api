<?php

namespace App\Helpers\Requests;

class MediaRuleHelper
{
    static public function rule(): array
    {
        return [
            'mimes:jpeg,png,jpg,gif,svg,mp4,avi,flv,mlv'
        ];
    }

    static public function attribute(): string
    {
        return 'mídia';
    }
}