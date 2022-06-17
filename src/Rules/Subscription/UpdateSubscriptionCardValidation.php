<?php
namespace MartinsHumberto\PagarmeGateway\Rules\Subscription;

class UpdateSubscriptionCardValidation
{
    protected static $validations = [
        'stable' => [
            'card_id' => 'nullable|string',
            'card' => 'nullable|array',
            'card.number' => 'required_with:card|between:13,19',
            'card.holder_name' => 'nullable|max:64|regex:/[a-zA-Z]+/',
            'card.holder_document' => 'nullable|between:11,14',
            'card.exp_month' => 'required_with:card|between:1,12',
            'card.exp_year' => 'required_with:card|date_format:Y',
            'card.cvv' => 'nullable|between:3,4',
            'card.label' => 'nullable',
            'card.billing_address_id' => 'nullable|max:36',
            'card.billing_address' => 'nullable|array',
            'card.billing_address.line_1' => 'nullable|max:256',
            'card.billing_address.line_2' => 'nullable|max:128',
            'card.billing_address.country' => 'nullable|size:2',
            'card.billing_address.state' => 'nullable|size:2',
            'card.billing_address.city' => 'nullable',
            'card.billing_address.street' => 'nullable',
            'card.billing_address.zipcode' => 'nullable|size:8',
            'card.billing_address.neighborhood' => 'nullable',
            'card.billing_address.street_number' => 'nullable',
            'card.billing_address.complementary' => 'nullable',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
