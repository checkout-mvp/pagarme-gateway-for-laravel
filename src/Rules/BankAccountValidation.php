<?php
namespace MartinsHumberto\PagarmeGateway\Rules;

class BankAccountValidation
{
    protected static $validations = [
        'stable' => [
            'holder_name' => 'required|string|max:30',
            'bank' => 'required|string|max:3',
            'branch_number' => 'required|string|max:4',
            'branch_check_digit' => 'required|string|max:1',
            'account_number' => 'required|string|max:13',
            'account_check_digit' => 'required|string|max:2',
            'holder_type' => 'required|string|in:individual,company',
            'holder_document' => 'required|string|max:16',
            'type' => 'required|string|in:checking,savings',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
