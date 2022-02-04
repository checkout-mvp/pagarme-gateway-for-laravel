<?php
namespace MartinsHumberto\PagarmeGateway\Rules;

class WithdrawValidation
{
    protected static $validations = [
        'stable' => [
            'recipient_id' => 'required|string',
            'amount' => 'nullable|integer|min:1',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
