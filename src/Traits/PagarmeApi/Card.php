<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

use MartinsHumberto\PagarmeGateway\Rules\CardValidation;
use RuntimeException;

trait Card
{
    public function getCards(string $customerId) {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getCustomers()->getCards($customerId);
        }
    }

    public function getCard(string $customerId, string $cardId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getCustomers()->getCard($customerId, $cardId);
        }
    }

    public function deleteCard(string $customerId, string $cardId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getCustomers()->deleteCard($customerId, $cardId);
        }
    }

    public function createCardToken(array $data)
    {
        $this->validate($data, CardValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getTokens()->createToken($this->public_key, $data);
        }
    }
}
