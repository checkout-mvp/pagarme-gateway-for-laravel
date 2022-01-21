<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

use MartinsHumberto\PagarmeGateway\Rules\ApiValidation;

trait Transaction
{
    public function createTransaction(array $data)
    {
        $this->validate($data, ApiValidation::rules($this->version));

        if ($this->version === 'stable') {
            return $this->client->getOrders()->createOrder($data);
        }

        return $this->client->transactions()->create($data);
    }
}
