<?php

namespace MartinsHumberto\PagarmeGateway\Rules\Subscription;

class CreatePlanValidation
{
    protected static $validations = [
        'stable' => [
            'name' => 'required|string|max:64',
            'description' => 'nullable|string',
            'shippable' => 'nullable|boolean',
            'payment_methods' => 'nullable|array',
            'payment_methods.*'  => 'required_with:payment_methods|string|distinct|in:credit_card,boleto,debit_card',
            'installments' => 'nullable|array',
            'installments.*' => 'required_with:installments|integer|distinct',
            'minimum_price' => 'nullable|integer',
            'statement_descriptor' => 'nullable|string',
            'currency' => 'required|string|size:3|in:BRL,ARS,BOB,CLP,COP,MXN,PYG,USD,UYU,EUR',
            'interval' => 'required|string|in:day,week,month,year',
            'interval_count' => 'required|integer|min:1',
            'trial_period_days' => 'nullable|integer|min:1',
            'billing_type' => 'nullable|string|in:prepaid,postpaid,exact_day',
            'billing_days' => 'required_with:billing_type,exact_day|array|min:1',
            'billing_days.*' => 'required_with:billing_type,exact_day|integer|distinct|min:1|max:28',
            'items' => 'nullable|array',
            'metadata' => 'nullable|array',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
