<?php
namespace MartinsHumberto\PagarmeGateway\Rules;

class BankAccountValidation
{
    protected static $validations = [
        'stable' => [
            'bank_account' => 'required|array',
            'bank_account.holder_name' => 'required|string|max:30',
            'bank_account.bank' => 'required|string|max:3',
            'bank_account.branch_number' => 'required|string|max:4',
            'bank_account.branch_check_digit' => 'nullable|string|max:1',
            'bank_account.account_number' => 'required|string|max:13',
            'bank_account.account_check_digit' => 'required|string|max:2',
            'bank_account.holder_type' => 'required|string|in:individual,company',
            'bank_account.holder_document' => 'required|string|max:16',
            'bank_account.type' => 'required|string|in:checking,savings',
            'payment_mode' => 'nullable|string',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
