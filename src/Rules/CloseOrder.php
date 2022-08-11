<?php

namespace MartinsHumberto\PagarmeGateway\Rules;

class CloseOrder
{
    protected static $validations = [
        'stable' => [
            'status' => 'nullable|in:paid,canceled,failed',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
