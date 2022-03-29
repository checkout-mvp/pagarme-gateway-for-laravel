<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

use MartinsHumberto\PagarmeGateway\Rules\TransactionValidation;
use MartinsHumberto\PagarmeGateway\Rules\TransactionWithSplitValidation;
use RuntimeException;

trait Transaction
{
    public function createTransaction(array $data)
    {
        $this->validate($data, TransactionValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            return $this->client->transactions()->create($data);
        }
        if ($this->version === 'stable') {
            return $this->client->getOrders()->createOrder($data);
        }
    }

    public function createTransactionWithSplit(array $data)
    {
        $this->validate($data, TransactionWithSplitValidation::rules($this->version));

        if ($this->version === '2019-09-01') {
            return $this->client->transactions()->create($data);
        }
        if ($this->version === 'stable') {
            return $this->client->getOrders()->createOrder($data);
        }
    }

    public function getOrder(string $orderId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getOrders()->getOrder($orderId);
        }
    }

    public function getOrders($page = null, $size = null)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getOrders()->getOrders($page, $size);
        }
    }
}
