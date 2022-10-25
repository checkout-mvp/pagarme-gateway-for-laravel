<?php
namespace MartinsHumberto\PagarmeGateway\Traits\PagarmeApi;

use RuntimeException;

trait Charge
{
    public function getCharge(string $chargeId)
    {
        if ($this->version === '2019-09-01') {
            throw new RuntimeException(
                "Not implemented yet."
            );
        }
        if ($this->version === 'stable') {
            return $this->client->getCharges()->getCharge($chargeId);
        }
    }
}
