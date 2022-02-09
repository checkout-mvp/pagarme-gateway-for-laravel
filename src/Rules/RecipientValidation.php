<?php
namespace MartinsHumberto\PagarmeGateway\Rules;

class RecipientValidation
{
    protected static $validations = [
        'stable' => [
            'name' => 'required|max:128',
            'email' => 'nullable|string|max:64',
            'description' => 'required|string|max:256',
            'document' => 'required|string|max:16',
            'type' => 'required|string|max:16|in:individual,company',
            'code' => 'nullable|string',
            'default_bank_account' => 'nullable|array',
            'default_bank_account.holder_name' => 'required_with:default_bank_account|string|max:30',
            'default_bank_account.bank' => 'required_with:default_bank_account|string|max:3',
            'default_bank_account.branch_number' => 'required_with:default_bank_account|string|max:4',
            'default_bank_account.branch_check_digit' => 'required_with:default_bank_account|string|max:1',
            'default_bank_account.account_number' => 'required_with:default_bank_account|string|max:13',
            'default_bank_account.account_check_digit' => 'required_with:default_bank_account|string|max:2',
            'default_bank_account.holder_type' => 'required_with:default_bank_account|string|in:individual,company',
            'default_bank_account.holder_document' => 'required_with:default_bank_account|string|max:16',
            'default_bank_account.type' => 'required_with:default_bank_account|string|in:checking,savings',
            'transfer_settings' => 'nullable|array',
            'transfer_settings.transfer_enabled' => 'required_with:transfer_settings|boolean',
            'transfer_settings.transfer_interval' => 'required_with:transfer_settings|string|in:day,week,month,year',
            'transfer_settings.transfer_day' => 'required_with:transfer_settings|integer',
            'automatic_anticipation_settings' => 'nullable|array',
            'automatic_anticipation_settings.enabled' => 'required_with:automatic_anticipation_settings|boolean',
            'automatic_anticipation_settings.type' => 'required_with:automatic_anticipation_settings|string|in:full,1025',
            'automatic_anticipation_settings.volume_percentage' => 'required_with:automatic_anticipation_settings|string',
            'automatic_anticipation_settings.delay' => 'required_with:automatic_anticipation_settings|string',
            'metadata' => 'nullable',
        ]
    ];

    public static function rules(string $version)
    {
        return self::$validations[$version];
    }
}
