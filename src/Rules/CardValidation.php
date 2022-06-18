<?php

namespace MartinsHumberto\PagarmeGateway\Rules;

class CardValidation
{
    protected static $validations = [
        'stable' => [
            'type' => 'required|in:card',
            'card' => 'required|array',
            'card.number' => 'required|between:13,19',
            'card.holder_name' => 'required|max:64|regex:/[a-zA-Z]+/',
            'card.exp_month' => 'required|between:1,12',
            'card.exp_year' => 'required|date_format:Y',
            'card.cvv' => 'required|between:3,4',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
