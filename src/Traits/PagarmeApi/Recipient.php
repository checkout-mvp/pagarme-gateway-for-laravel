<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

use MartinsHumberto\PagarmeGateway\Rules\BankAccountValidation;
use MartinsHumberto\PagarmeGateway\Rules\RecipientValidation;
use MartinsHumberto\PagarmeGateway\Rules\WithdrawValidation;
use RuntimeException;

trait Recipient
{
    public function createRecipient(array $data)
    {
        $this->validate($data, RecipientValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->createRecipient($data);
        }
    }

    public function updateRecipient($recipientId, array $data)
    {
        $this->validate($data, RecipientValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->updateRecipient($recipientId, $data);
        }
    }

    public function updateRecipientDefaultBankAccount($recipientId, array $data)
    {
        $this->validate($data, BankAccountValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->updateRecipientDefaultBankAccount($recipientId, $data);
        }
    }

    public function getRecipients($page = null, $size = null)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->getRecipients($page, $size);
        }
    }

    public function getBalance($recipientId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->getBalance($recipientId);
        }
    }

    public function createWithdraw($recipientId, array $data)
    {
        $this->validate($data, WithdrawValidation::rules($this->version));
        
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->createWithdraw($recipientId, $data);
        }
    }

    public function getWithdrawals(
        $recipientId,
        $page = null,
        $size = null,
        $status = null,
        $createdSince = null,
        $createdUntil = null
    ) {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->getWithdrawals(
                $recipientId,
                $page,
                $size,
                $status,
                $createdSince,
                $createdUntil
            );
        }
    }

    public function getWithdrawById(
        $recipientId,
        $withdrawalId
    ) {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getRecipients()->getWithdrawById(
                $recipientId,
                $withdrawalId
            );
        }
    }
}
