<?php

namespace MartinsHumberto\PagarmeGateway\Rules\Subscription;

class CancelSubscriptionValidation
{
    protected static $validations = [
        'stable' => [
            'cancel_pending_invoices' => 'nullable|boolean',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
