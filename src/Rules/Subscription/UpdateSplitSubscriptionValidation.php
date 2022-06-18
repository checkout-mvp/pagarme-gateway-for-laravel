<?php

namespace MartinsHumberto\PagarmeGateway\Rules\Subscription;

class UpdateSplitSubscriptionValidation
{
    protected static $validations = [
        'stable' => [
            'enabled' => 'nullable|boolean',
            'rules' => 'nullable|array',
            'rules.*.amount' => 'nullable|string',
            'rules.*.type' => 'nullable|string|in:flat,percentage',
            'rules.*.recipient_id' => 'nullable|string',
            'rules.*.options' => 'nullable|array',
            'rules.*.options.charge_processing_fee' => 'required_with:rules.*.options|boolean',
            'rules.*.options.charge_remainder_fee' => 'required_with:rules.*.options|boolean',
            'rules.*.options.liable' => 'required_with:rules.*.options|boolean',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
